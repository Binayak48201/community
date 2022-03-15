<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MustConfirmEmailAddress
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
        if(!auth()->user()->email_verified_at){
           return redirect('/posts')->with('flash','Must be confirmed to to create a post.');
        }
        return $next($request);
    }
}
