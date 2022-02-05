<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class SiteLogin
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


        if (!(Auth::guard("web")->check())) {
            return redirect()->route("site.login")->with("error"," у вас нет доступа к странице без авторизации");
        }
        

        return $next($request);
    }
}
