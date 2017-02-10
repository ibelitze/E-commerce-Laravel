<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        $usuario= Auth::user();
        if ($usuario->email == "admin@admin.com" ){
          return $next($request);
        }
        else {
          abort(503);
        }

    }
}
