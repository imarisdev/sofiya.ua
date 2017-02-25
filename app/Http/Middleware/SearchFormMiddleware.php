<?php

namespace App\Http\Middleware;

use View;
use Closure;
use App\Repositories\ComplexRepository;
use App\Repositories\PlansTypeRepository;
use App\Repositories\StreetRepository;

class SearchFormMiddleware {

    protected $complex;
    protected $street;
    protected $plansType;

    public function __construct(ComplexRepository $complex, StreetRepository $street, PlansTypeRepository $plansType) {
        $this->complex = $complex;
        $this->street = $street;
        $this->plansType = $plansType;
    }

    public function handle($request, Closure $next) {

        $this->searchForm();

        return $next($request);
    }


    /**
     * Данные для формы поиска
     */
    public function searchForm() {

        $search_from['complex_list'] = $this->complex->getComplexesForSelect(['status' => 1]);
        $search_from['streets'] = $this->street->getStreetsForSelect();
        $search_from['plan_types'] = $this->plansType->getPlansTypesForSelect();

        View::share(['search_from' => $search_from]);
    }

}