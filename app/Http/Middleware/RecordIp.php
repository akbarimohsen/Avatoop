<?php

namespace App\Http\Middleware;

use App\Models\userIp;
use Closure;
use Illuminate\Http\Request;

class RecordIp
{


    public function handle(Request $request, Closure $next)
    {
        $user_ip  = $request->ip();
        $ipExists = userIp::where('ip_address',$user_ip)->exists();

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
