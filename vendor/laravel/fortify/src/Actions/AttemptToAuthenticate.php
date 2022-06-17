<?php

namespace Laravel\Fortify\Actions;

use App\Models\userTotalOnline;
use Carbon\Carbon;
use Illuminate\Auth\Events\Failed;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\LoginRateLimiter;

class AttemptToAuthenticate
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * The login rate limiter instance.
     *
     * @var \Laravel\Fortify\LoginRateLimiter
     */
    protected $limiter;

    /**
     * Create a new controller instance.
     *
     * @param \Illuminate\Contracts\Auth\StatefulGuard $guard
     * @param \Laravel\Fortify\LoginRateLimiter $limiter
     * @return void
     */
    public function __construct(StatefulGuard $guard, LoginRateLimiter $limiter)
    {
        $this->guard = $guard;
        $this->limiter = $limiter;
    }

    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param callable $next
     * @return mixed
     */
    public function handle($request, $next)
    {
        if (Fortify::$authenticateUsingCallback) {
            return $this->handleUsingCustomCallback($request, $next);
        }

        if ($this->guard->attempt($request->only(Fortify::username(), 'password'), $request->boolean('remember'))) {

            //Create time to go online
            $exist = userTotalOnline::where('user_id', '=', Auth::id())->first();
            if (!$exist) {
                $query = userTotalOnline::create([
                    'user_id' => Auth::id(),
                    'online_time' => Carbon::now()->timestamp,
                    'offline_time' => 0,
                    'total_online' => 0,
                ]);
                if ($query) {
                    return $next($request);
                } else {
                    return redirect()->route('auth.login');
                }
            } else {
                $query = userTotalOnline::where('user_id', '=', Auth::id())->first()->update([
                    'online_time' => Carbon::now()->timestamp,
                ]);
                if ($query) {
                    return $next($request);
                } else {
                    session()->flash('status','متاسفانه مشکلی پیش آمذه');
                    return redirect()->route('auth.login');
                }
            }

        }

        $this->throwFailedAuthenticationException($request);
    }

    /**
     * Attempt to authenticate using a custom callback.
     *
     * @param \Illuminate\Http\Request $request
     * @param callable $next
     * @return mixed
     */
    protected function handleUsingCustomCallback($request, $next)
    {
        $user = call_user_func(Fortify::$authenticateUsingCallback, $request);

        if (!$user) {
            $this->fireFailedEvent($request);

            return $this->throwFailedAuthenticationException($request);
        }

        $this->guard->login($user, $request->boolean('remember'));

        return $next($request);
    }

    /**
     * Throw a failed authentication validation exception.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function throwFailedAuthenticationException($request)
    {
        $this->limiter->increment($request);

        throw ValidationException::withMessages([
            Fortify::username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Fire the failed authentication attempt event with the given arguments.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function fireFailedEvent($request)
    {
        event(new Failed(config('fortify.guard'), null, [
            Fortify::username() => $request->{Fortify::username()},
            'password' => $request->password,
        ]));
    }
}
