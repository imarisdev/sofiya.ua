<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Response;

class HeadersMiddleware {

    public function handle($request, Closure $next) {

        $response = $next($request);

        $response->header('Last-Modified', date('Y-m-d\TH:i:sO'));
        $response->header('If-Modified-Since', date('Y-m-d\TH:i:sO'));

        return $response;
    }

}