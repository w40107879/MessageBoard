<?php namespace App\Http\Middleware;

// app\Http\Middleware\Authenticate.php

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate {

    protected $auth;

    /**
     * Create a new filter instance.
     * 建立過濾器實例，建構時注入 Guard 類別並存到 auth 變數
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     * 處理 request
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest())
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->guest('auth/login');
            }
        }

        return $next($request);
    }

}
