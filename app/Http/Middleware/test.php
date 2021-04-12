<?php

namespace App\Http\Middleware;

use Closure;

class test
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
        $ip= $request->ip();

        if($ip == 'http://192.168.1.227/projects/blog/public/admin/user/create'){
           return redirect('test');
        }

        return $next($request);
    }
}
