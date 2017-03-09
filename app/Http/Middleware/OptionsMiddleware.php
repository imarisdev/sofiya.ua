<?php

namespace App\Http\Middleware;

use View;
use Closure;
use App\Repositories\OptionsRepository;

class OptionsMiddleware {

    protected $options;

    public function __construct(OptionsRepository $options) {
        $this->options = $options;
    }

    public function handle($request, Closure $next) {

        $optionsList = [];

        foreach($this->options->getAllOptions() as $option) {
            $optionsList[$option['options_key']] = $option['options_value'];
        }

        View::share(['options' => $optionsList]);

        return $next($request);

    }
}