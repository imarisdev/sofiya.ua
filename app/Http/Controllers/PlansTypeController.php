<?php
namespace App\Http\Controllers;

use App\Repositories\ComplexRepository;
use App\Repositories\HouseRepository;
use App\Repositories\PlansRepository;
use App\Repositories\PlansTypeRepository;

class PlansTypeController extends Controller {

    protected $types;
    protected $plans;
    protected $complex;
    protected $house;

    public function __construct(PlansTypeRepository $types, PlansRepository $plans, ComplexRepository $complex, HouseRepository $house) {
        $this->types = $types;
        $this->plans = $plans;
        $this->house = $house;
        $this->complex = $complex;
    }

    /**
     * Страница типа планировок
     * @param $type
     * @return mixed
     */
    public function index($complex, $type) {

        $type = $this->types->getPlansTypeBySlug($type);

        $complex = $this->complex->getBySlug($complex);

        $houses = $this->house->getByComplexId($complex->id);

        $plans = [];

        foreach($houses as $key => $house) {
            foreach($house->plansCache()->where('plans_type', $type['key'])->get() as $plan) {
                $plans[] = $plan;
            }
        }

        return view('planstype.index', compact('houses', 'type', 'complex', 'plans'));

    }

}