<?php

namespace App\Http\Middleware;

use Closure;

class Test
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
//        session()->flash('test', 'test-key-from-test-middleware');

//        session()->flash('test', 'test-key-from-test-middleware-api-routes');

//        session()->flash('test', 'test-key-from-test-middleware-specific-routes');

//        dd('test-key-from-test-middleware-api-routes');

        dd('test-key-from-test-middleware-specific-routes');

        return $next($request);
    }
}
