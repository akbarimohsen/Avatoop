<?php

namespace App\Http\Middleware;

use App\Models\userIp;
use Closure;
use Illuminate\Http\Request;

class RecordIp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user_ip=$request->ip();
        $ipExists=userIp::where('ip_address',$user_ip)->exists();
        if(!$ipExists){
            userIp::create([
                'ip_address'=>$user_ip
            ]);
            return $next($request);
        }else{
            return $next($request);
        }

    }
}
