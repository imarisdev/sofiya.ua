<?php
namespace App\Http\Controllers;

use App\Repositories\ComplexRepository;
use App\Repositories\HouseRepository;
use App\Repositories\PlansRepository;
use App\Repositories\PlansTypeRepository;
use App\Repositories\SeoRepository;

class PlansController extends Controller {

    protected $complex;
    protected $house;
    protected $types;
    protected $plans;
    protected $seo;

    public function __construct(ComplexRepository $complex, HouseRepository $house, PlansTypeRepository $types, PlansRepository $plans, SeoRepository $seo) {
        $this->complex = $complex;
        $this->house = $house;
        $this->types = $types;
        $this->plans = $plans;
        $this->seo = $seo;
    }

    /**
     * Страница всех планировок
     */
    public function allPlans() {

        $types = $this->types->getPlansTypes();

        return view('plans.allplans', compact('types'));

    }

    /**
     * Страница типа планировок
     * @param $type
     * @return mixed
     */
    public function typePlans($type) {

        $type = $this->types->getPlansTypeBySlug($type);

        $plans = $this->plans->getPlansByType($type['key'], null);

        return view('plans.typeplans', compact('type', 'plans'));

    }

    /**
     * Страница планировки
     * @param $url
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function plan($type, $id, $plan) {

        //$complex = $this->complex->cache('getBySlug', 'complex_' . $complex, $complex);

        //$house = $this->house->getById($id);

        $type = $this->types->getPlansTypeBySlug($type);

        $plan = $this->plans->getById($id);

        $seo_params = [
            'name' => $plan->title,
            'address' => $plan->house->street->title . ", " . $plan->house->number
        ];

        $this->seo->getSeoData($plan->id, 'plans', $seo_params);

        return view('plans.index', compact('plan', 'type'));
    }

}