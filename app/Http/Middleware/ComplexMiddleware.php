<?php
namespace App\Http\Middleware;

use View;
use Closure;

class ComplexMiddleware {

    public function handle($request, Closure $next) {

        View::share(['complex' => null]);

        return $next($request);

    }

}

