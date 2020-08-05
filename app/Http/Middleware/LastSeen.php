<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class LastSeen
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
        if (!auth()->check()) {
            return $next($request);
        }

        User::where('id', auth()->id())->update(['lastseen' => now()]);

        return $next($request);
    }
}
