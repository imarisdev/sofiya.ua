<?php
namespace App\Http\Controllers;

use App\Repositories\ComplexRepository;
use App\Repositories\HouseRepository;
use App\Repositories\PlansRepository;
use App\Repositories\PlansTypeRepository;

class PlansController extends Controller {

    protected $complex;
    protected $house;
    protected $types;
    protected $plans;

    public function __construct(ComplexRepository $complex, HouseRepository $house, PlansTypeRepository $types, PlansRepository $plans) {
        $this->complex = $complex;
        $this->house = $house;
        $this->types = $types;
        $this->plans = $plans;
    }

    /**
     * Страница планировки
     * @param $url
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($complex, $type, $id, $house, $pid, $plan) {

        $complex = $this->complex->cache('getBySlug', 'complex_' . $complex, $complex);

        $house = $this->house->getById($id);

        $type = $this->types->getPlansTypeBySlug($type);

        $plan = $this->plans->getById($pid);

        return view('plans.index', compact('complex', 'house', 'plan', 'type'));
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

        return view('plans.typeplans', compact('type'));

    }

}