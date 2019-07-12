<?php

namespace App\Http\Middleware;

use App\Students;
use Closure;

class ValidateStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $student = Students::query();

        return $next($request);
    }
}
