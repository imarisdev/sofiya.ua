<?php

namespace App\Http\Controllers;

use App\Repositories\FlatsRepository;
use App\Repositories\PlansRepository;
use App\Repositories\PlansTypeRepository;
use Illuminate\Http\Request;
use App\Repositories\SeoRepository;

class SearchController extends Controller {

    protected $seo;
    protected $plans;
    protected $plansTypes;

    public function __construct(SeoRepository $seo, PlansRepository $plans, PlansTypeRepository $plansTypes) {
        $this->seo = $seo;
        $this->plans = $plans;
        $this->plansTypes = $plansTypes;
    }

    /**
     * Поиск квартир
     * @param $request
     * @return mixed
     */
    public function index(Request $request) {

        $plans = $this->plans->searchPlans($request->all(), 16);

        $breadcrumbs = [
            [
                'title' => "Поиск"
            ]
        ];

        $seo_params = [];

        $this->seo->getSeoData(null, 'search', $seo_params);

        $type = $this->plansTypes->getPlansTypeById($request->get('plan_types', null));

        return view('search.index', compact('breadcrumbs', 'plans', 'type'));
    }

}