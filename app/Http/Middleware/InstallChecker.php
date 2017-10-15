<?php

namespace App\Http\Middleware;

use Closure;

class InstallChecker
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
        if(config('install.installed') == true) {
            return $next($request);
        }
        return redirect('/dx-install');
    }
}
