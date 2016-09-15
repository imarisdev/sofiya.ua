<?php
namespace App\Http\Controllers;


use App\Repositories\HouseRepository;
use App\Repositories\StreetRepository;
use App\Repositories\BuildingTypesRepository;
use App\Repositories\PlansRepository;
use App\Repositories\PlansTypeRepository;

class StreetController extends Controller {

    protected $street;
    protected $house;
    protected $types;
    protected $plans;
    protected $building_types;

    public function __construct(
        StreetRepository $street,
        HouseRepository $house,
        PlansTypeRepository $types,
        PlansRepository $plans,
        BuildingTypesRepository $building_types
    ) {

        $this->street = $street;
        $this->house = $house;
        $this->types = $types;
        $this->plans = $plans;
        $this->building_types = $building_types;
    }

    /**
     * Страница улиц
     * @return mixed
     */
    public function index() {

        $streets = $this->street->getStreets();

        $houses = $this->house->getHouses(null, 4);

        $breadcrumbs = [
            [
                'title' => "Улицы"
            ]
        ];

        return view('street.index', compact('streets', 'houses', 'breadcrumbs'));
    }

    /**
     * Страница улицы
     * @param $id
     * @param $street
     * @return mixed
     */
    public function street($sid, $street) {

        $street = $this->street->getById($sid);

        $houses = $street->houses;

        $breadcrumbs = [
            [
                'title' => "Улицы",
                'link' => "/ulitsy"
            ],
            [
                'title' => "{$street->title}"
            ]
        ];

        return view('street.street', compact('street', 'houses', 'breadcrumbs'));
    }

    /**
     * Страница дома
     * @param $complex
     * @param $type
     * @param $id
     * @param $house
     * @return mixed
     */
    public function house($sid, $street, $id, $house) {

//TODO: переместить все в нужный контроллер

        $house = $this->house->getById($id);

        $types = $this->types->getPlansTypes();

        $plans_list = [];

        foreach($house->plans as $plan) {
            $plans_list[$types[$plan->plans_type]['short']]['plans'][] = $plan;
            $plans_list[$types[$plan->plans_type]['short']]['info'] = $types[$plan->plans_type];
            $plans_list[$types[$plan->plans_type]['short']]['info']['id'] = $plan->plans_type;
        }

        $type = $this->types->getPlansTypeBySlug('odnokomnatnye-kvartiry');

        $house_class = $this->house->getHouseClass();

        $building_types = $this->building_types->getTypesForSelect();

        $house_decoration = $this->house->getHouseDecoration();

        $installments = $this->house->getHouseInstallments();

        $bathroom_types = $this->plans->getBathroomTypes();

        $balcony_types = $this->plans->getBalconyTypes();

        return view('street.house',
            compact('house', 'house_class', 'type', 'building_types', 'house_decoration', 'installments', 'plans_list', 'bathroom_types', 'balcony_types')
        );

    }

}