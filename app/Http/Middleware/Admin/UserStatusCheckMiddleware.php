<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserStatusCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->status=='Inactive'){
            Auth::logout();
            return redirect()->route('login')->with('status',1);
        }elseif(Auth::user()->delete_user==1){
            Auth::logout();
            return redirect()->route('login')->with('delete',1);
        }else{
            return $next($request);
        }
    }
}
