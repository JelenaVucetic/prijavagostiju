<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Informant
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 2  && Auth::user()->active == 1 ) {
            return $next($request);
        }
        
         if (Auth::user()->role == 2 && Auth::user()->active == 0) {
            return back()->with('message-error', "Korisinik nije aktivan");
        } 

      /*   if (Auth::user()->role == 1) {
            return redirect()->route('admin');
        }

        
        if (Auth::user()->role == 3) {
            return redirect()->route('inspector');
        } */
    }
}
