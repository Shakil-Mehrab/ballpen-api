<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProfileJsonResponse
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($response instanceof JsonResponse && app()->isLocal() && app('debugbar')->isEnabled() && $request->has('_debug')) {
            $response->setData($response->getData(true) + [
                '_debugbar' => Arr::only(app('debugbar')->getData(), 'queries'),
            ]);
        }

        return $response;
    }
}
