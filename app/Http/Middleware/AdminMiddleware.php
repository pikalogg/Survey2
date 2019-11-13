<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // return $next($request);  
        if(Auth::check()){
            $user= Auth::user();
             // echo $user->level;  
             if($user->level==1){
                return redirect('/');
             }else{
                return $next($request);  
             }
        }else {
            return redirect('/login');
        }
        
    }
}
