<?php
namespace App\Http\Controllers;

use App\Repositories\BuildingTypesRepository;
use App\Repositories\ComplexRepository;
use App\Repositories\HouseRepository;
use App\Repositories\PlansRepository;
use App\Repositories\PlansTypeRepository;

class HouseController extends Controller {

    protected $complex;
    protected $house;
    protected $types;
    protected $plans;
    protected $building_types;

    public function __construct(
        ComplexRepository $complex,
        HouseRepository $house,
        PlansTypeRepository $types,
        PlansRepository $plans,
        BuildingTypesRepository $building_types
    ) {
        $this->complex = $complex;
        $this->house = $house;
        $this->types = $types;
        $this->plans = $plans;
        $this->building_types = $building_types;
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

        $types = $this->types->getPlansTypes();

        $plans_list = [];

        foreach($house->plans as $plan) {
            $plans_list[$types[$plan->plans_type]['short']]['plans'][] = $plan;
            $plans_list[$types[$plan->plans_type]['short']]['info'] = $types[$plan->plans_type];
            $plans_list[$types[$plan->plans_type]['short']]['info']['id'] = $plan->plans_type;
        }

        $type = $this->types->getPlansTypeBySlug($type);

        //$plans = $this->plans->getPlansByType($type['key'], $complex);

        $house_class = $this->house->getHouseClass();

        $building_types = $this->building_types->getTypesForSelect();

        $house_decoration = $this->house->getHouseDecoration();

        $installments = $this->house->getHouseInstallments();

        $bathroom_types = $this->plans->getBathroomTypes();

        $balcony_types = $this->plans->getBalconyTypes();

        return view('house.index',
            compact('complex', 'house', 'plans', 'type', 'house_class', 'building_types', 'house_decoration', 'installments', 'plans_list', 'bathroom_types', 'balcony_types')
        );

    }

}