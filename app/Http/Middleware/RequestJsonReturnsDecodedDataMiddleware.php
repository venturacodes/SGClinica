<?php

namespace Dentist\Http\Middleware;

use Closure;

class RequestJsonReturnsDecodedDataMiddleware
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
        if($request->isJson()){
            $data = json_decode($request->getContent(), TRUE);
            $request->replace($data);
        }
        return $next($request);
    }
}
