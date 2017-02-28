<?php
namespace App\Http\Middleware;

use App\Repositories\ComplexRepository;
use View;
use Closure;

class ComplexMiddleware {

    protected $complex;

    protected $current_complex = null;

    protected $default_complex = null;

    public function __construct(ComplexRepository $complex) {
        $this->complex = $complex;
    }

    public function handle($request, Closure $next) {

        $complexList = $this->complex->getModel()
            ->where('status', '=', 1)
            ->get();

        foreach($complexList as $item) {

            $item->active = false;

            if (\Request::is('*' . $item->slug . '*')) {
                $item->active = true;
                $this->current_complex = $item;
            }
        }

        // Set default complex
        $this->default_complex = $this->complex->getById(1);
        $this->default_complex->active = true;

        View::share(['current_complex' => $this->current_complex]);
        View::share(['default_complex' => $this->default_complex]);
        View::share(['complex_list' => $complexList]);

        return $next($request);

    }

}

