<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VoterAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('voter_id') && request()->is('voter/login')) {
            return back();
        }
        if (session()->has('voter_id')) {
            return $next($request);
        }
        return $next($request);
    }
}
