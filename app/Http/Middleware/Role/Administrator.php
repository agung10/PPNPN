<?php

namespace App\Http\Middleware\Role;

use Closure;

class Administrator
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
        if(\Auth::user()->role == "Administrator" || \Auth::user()->role == "AdminUtama"){
            return$next($request);
        }
        else{
            abort(404);
        }
    }
}
