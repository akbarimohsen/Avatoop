<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    //

    public function checkUserType(){
        if( !Auth::check() ){
            return view('welcome');
        }else{
            if( Auth::user()->role->role_type === "ADMIN" ){
                return redirect()->route('admin.dashboard');

            }else if(Auth::user()->role->role_type === "USER"){
                return redirect()->route('user.dashboard');
            }
        }
    }
}
