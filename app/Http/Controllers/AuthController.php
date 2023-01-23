<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;



class AuthController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255',
            'phone_number' => 'required|unique:users',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required'
        ]);
        $data = new User();
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone_number = $request->phone_number;
        $data->password = Hash::make($request->password);
        $data->save();
        $data->assignRole('user');

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Invalid login details');
        }

        return response()->json([
            'user' => $data
        ]);
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => "required|email",
            'password' => "required",
        ]);
        $user = User::where('email', $credentials['email'])->first();
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            $response = [
                'message' => '??????? ??? ??? ??? ?????!'
            ];
            return \response()->json($response, \Symfony\Component\HttpFoundation\Response::HTTP_UNAUTHORIZED);
        } else {
            // $attempt=Auth::attempt(['email'=>$request->email,'password'=>$request->password, 'remember' => $request->remember]);
            //           return response()->json([
            //               'user' => $user
            //           ]);
            //           return response()->json([
            //               'user' => $user->id
            //           ]);
            // $logged = Auth::loginUsingId($user->id);
            $loggedInUser = Auth::loginUsingId($user->id);
            if (!$loggedInUser) {
                throw new Exception('Single SignOn: User Cannot be Signed In');
            }
            //           return response()->json([
            //               'user' => $logged
            //           ]);
            return response()->json([
                'login' => 'user login Successfully',
                'token' => $user->createToken('accessToken')->accessToken
            ]);
            //           if ($attempt){
            //               $token=$user->createToken('userToken')->plainTextToken;
            //               $response=[
            //                   'token'=>$token,
            //                   'user'=>$user
            //               ];
            //               return \response()->json($response,\Symfony\Component\HttpFoundation\Response::HTTP_OK);
            //           }else{
            //               throw ValidationException::withMessages([
            //                   'email' => ['The provided credentials are incorrect.'],
            //               ]);
            //           }

        }
    }


    public function doLoginPhone(Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'phone_number' => 'required|exists:users',
        ]);
        $phoneNumber = $request->phone_number;
        if ($user = User::where('phone_number', $phoneNumber)->pluck('id')[0]) {

            $user = User::where('phone_number', $request->input('phone_number'))->first();

            // DB::delete("DELETE FROM tokens WHERE user_id = $user->id");
            Token::where('user_id', $user->id)->delete();
            $token = Token::create([
                'user_id' => $user->id
            ]);
            // $send = $token->sendCode();

            if ($token->sendCode($phoneNumber, $user)) {
                return response()->json([
                    'message' => 'پیام ارسال شد',
                    'user' => $user
                ]);
            }
        } else {
            return response()->json(
                ['MSG' => 'شماره تلفن اشتباه است'],
                400
            );

            // return response()->json([
            //     'message' => 'شماره تلفن اشتباه است'
            // ]);
        }




        ///////////////////////////////////
        // $data = $request->all();
        // $this->validate($request, [
        //     'phone' => 'required|exists:users',
        // ]);
        // $user = User::where('phone', $request->input('phone'))->first();
        // $token = Token::create([
        //     'user_id' => $user->id
        // ]);
        // $rememberMe  = (!empty($request->remember_me)) ? TRUE : FALSE;
        // if ($token->sendCode()) {
        //     session()->put("code_id", $token->id);
        //     session()->put("user_id", $user->id);
        //     session()->put("remember", $rememberMe);

        //     return redirect()->route('verify');
        // }

        // $token->delete();
        // return redirect()->route('login')->withErrors([
        //     "Unable to send verification code"
        // ]);
    }
    // public function verify()
    // {
    //     return view('auth.verify');
    // }
    public function doVerify(Request $request, $id)
    {
        $datat = $request->all();
        $this->validate($request, [
            'code' => 'required'
        ]);

        //try {
        $code = $request->code;

        $users = User::where(['id' => $id])->get()->first();
        if (!$users) {
            return response()->json(
                ['MSG' => 'unauthentiacted'],
                400
            );
        }
        $data = Token::where('user_id', $users->id)->pluck('code')[0];
        $datat = Token::where('user_id', $users->id)->pluck('id')[0];
        $expire = Token::where(['user_id' => $users->id])->get()->first();
        if (!$expire->isValid()) {
            //DB::delete("DELETE FROM tokens WHERE id = $datat");
            Token::where('id', $datat)->delete();
            return response()->json(
                ['MSG' => 'این کد قبلا استفاده شده یا منقضی شده است'],
                400
            );
        }

        if ($code == $data) {
            //DB::update("update tokens set used = true where user_id = $users->id");
            // DB::delete("DELETE FROM tokens WHERE id = $datat");
            $loggedInUser = Auth::loginUsingId($users->id);
            if (!$loggedInUser) {
                throw new Exception('Single SignOn: User Cannot be Signed In');
            }
            $token = $users->createToken('accessToken')->accessToken;
            return response($token, 201)
                ->header("Accept", "application/json")
                ->cookie("Authorization", "Bearer " . $token, 360000);
        }
        if ($code !== $data) {
            return response()->json(
                ['MSG' => 'کد اشتباه است'],
                400
            );
        }
        // } catch (\Exception $ex) {
        //     return response()->json(
        //         ['MSG' => 'این کد قبلا   منقضی شده است'],
        //         400
        //     );
        // }
    }

    public function andriod(Request $request)
    {
        $email = $this->validate($request, [
            'email' => 'required|email',
        ]);
        try {
            $user = User::where('email', $email)->get()->first();
            $loggedInUser = Auth::loginUsingId($user->id);
            $token = $user->createToken('accessToken')->accessToken;
            return response()->json([
                'token' => $token,
            ]);
        } catch (Exception $ex) {
            return response()->json(['MSG' => 'همچین ایمیلی وجود ندارد'], 400);
        }
    }
}
