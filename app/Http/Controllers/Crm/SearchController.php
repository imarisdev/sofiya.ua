<?php
namespace App\Http\Controllers\Crm;

use App\Repositories\FlatsRepository;
use Illuminate\Http\Request;
use App\Repositories\ComplexRepository;
use App\Repositories\HouseRepository;
use App\Repositories\PlansTypeRepository;

class SearchController extends CrmController {

    protected $flats;
    protected $complex;
    protected $plans_type;
    protected $house;

    public function __construct(FlatsRepository $flats, ComplexRepository $complex, PlansTypeRepository $plans_type, HouseRepository $houses) {

        $this->flats = $flats;
        $this->complex = $complex;
        $this->plans_type = $plans_type;
        $this->house = $houses;
    }

    /**
     * Поиск квартир
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request) {

        $flats = $this->flats->searchFlats($request->all(), 50);

        $complex = $this->complex->getComplexesForSelect();

        $plans_type = $this->plans_type->getPlansTypesForSelect();

        $houses = $this->house->getHousesForSelect();

        $status = $this->flats->getSales();

        return view('crm.search.index', compact('flats', 'complex', 'plans_type', 'houses', 'status'));

    }

    /**
     * Просмотр квартиры
     * @param $id
     * @return mixed
     */
    public function show($id) {

        $flat = $this->flats->getById($id);

        $complex = $this->complex->getComplexesForSelect();

        $plans_type = $this->plans_type->getPlansTypesForSelect();

        $houses = $this->house->getHousesForSelect();

        return view('crm.search.show', compact('flat', 'complex', 'plans_type', 'houses'));
    }

}