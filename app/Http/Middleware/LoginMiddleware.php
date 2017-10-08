<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        if(!session('master'))
        {
            return redirect('/login')->with(['info'=>'您尚未登录,请先登录']);
        }
        if(session('master')->status == 0)
        {
            return redirect('/login')->with(['info'=>'抱歉，您的账号不能登录，请联系管理员。']);
        }
        return $next($request);
    }
}

