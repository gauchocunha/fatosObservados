<?php

namespace App\Http\Middleware;

use Closure;
use Cache;

class RouteCache
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
        $key = $this->getRouteKey($request);

        if(Cache::has($key)) {
            return Cache::get($key);
        }

        return $next($request);
    }

    public function terminate($request, $response)
    {
        if ($response->getContent()) {
            $key = $this->getRouteKey($request);
            if (!Cache::has($key)) {
                $minutes = 1;
                Cache::add($key, $response->getContent(), $minutes);
            }
        }
    }

    private function getRouteKey($request){
        return $request->url();
    }
}

