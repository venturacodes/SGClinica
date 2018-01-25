<?php

namespace Dentist\Http\Middleware;

use Closure;
use Illuminate\Foundation\Testing\HttpException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Dentist\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CheckCustomDentistAuth
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
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password ])){
            return $next($request);
        }
        throw new NotFoundHttpException();
    }
}
