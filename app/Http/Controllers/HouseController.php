<?php
namespace App\Http\Controllers;

use App\Repositories\ComplexRepository;
use App\Repositories\HouseRepository;
use App\Repositories\PlansRepository;
use App\Repositories\PlansTypeRepository;

class HouseController extends Controller {

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
     * Страница дома
     * @param $complex
     * @param $type
     * @param $id
     * @param $house
     * @return mixed
     */
    public function index($complex, $type, $id, $house) {

        $complex = $this->complex->cache('getBySlug', 'complex_' . $complex, $complex);

        $house = $this->house->getById($id);

        $type = $this->types->getPlansTypeBySlug($type);

        $plans = $this->plans->getPlansByType($type['key'], $complex);

        return view('house.index', compact('complex', 'house', 'plans', 'type'));

    }

}