<?php

namespace App\Http\Middleware;

use Closure;
use App\Admin;

class AdminSession
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
            if(Admin::checkSession()) {
                return $next($request);
            }
            else {
                return redirect("/");
            }
        }
        else {
            return redirect('/dx-install');
        }
    }
}
