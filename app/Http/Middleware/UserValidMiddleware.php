<?php

namespace App\Http\Middleware;

use Closure;

class UserValidMiddleware
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
        $user = auth()->user();
        if($user->invalidatedUser){
            return redirect()->route('unverified');
        }
        return $next($request);
    }
}
