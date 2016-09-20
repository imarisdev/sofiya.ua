<?php
namespace App\Http\Controllers\Admin;

use App\Repositories\BuildingTypesRepository;
use App\Repositories\ComplexRepository;
use App\Repositories\MedialibRepository;
use App\Repositories\SeoRepository;
use App\Repositories\StreetRepository;
use Illuminate\Http\Request;
use App\Contracts\AdminItemContract;
use App\Repositories\HouseRepository;

class HousesController extends AdminController implements AdminItemContract {

    protected $medialib;
    protected $house;
    protected $street;
    protected $complex;
    protected $building_types;
    protected $seo;

    public function __construct(
        HouseRepository $house,
        StreetRepository $street,
        ComplexRepository $complex,
        BuildingTypesRepository $building_types,
        SeoRepository $seo,
        MedialibRepository $medialib
    ) {

        $this->house = $house;
        $this->street = $street;
        $this->complex = $complex;
        $this->building_types = $building_types;
        $this->seo = $seo;
        $this->medialib = $medialib;
    }

    /**
     * Главная страница
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request) {

        $houses = $this->house->getHouses($request->all());

        return view('admin.houses.index', compact('houses'));

    }

    /**
     * Новый объект
     * @param $id
     * @return mixed
     */
    public function create() {

        $streets = $this->street->getStreetsForSelect();

        $complex = $this->complex->getComplexesForSelect();

        $building_types = $this->building_types->getTypesForSelect();

        $house_class = $this->house->getHouseClass();

        $house_decoration = $this->house->getHouseDecoration();

        $installments = $this->house->getHouseInstallments();

        return view('admin.houses.create', compact('streets', 'complex', 'building_types', 'house_class', 'house_decoration', 'installments'));
    }

    /**
     * Создание
     * @param Request $request
     */
    public function store(Request $request) {

        return $this->house->store($request->all());

    }

    /**
     * Редактирование
     * @param $id
     * @return mixed
     */
    public function edit($id) {

        $house = $this->house->getById($id);

        $streets = $this->street->getStreetsForSelect();

        $complex = $this->complex->getComplexesForSelect();

        $building_types = $this->building_types->getTypesForSelect();

        $house_class = $this->house->getHouseClass();

        $house_decoration = $this->house->getHouseDecoration();

        $installments = $this->house->getHouseInstallments();

        $seo = $this->seo->getSeoItem($id, 'houses');

        $photos = $this->medialib->getFiles(['object_id' => $house->id, 'object_type' => 'house']);

        return view('admin.houses.edit', compact('house', 'streets', 'complex', 'building_types', 'house_class', 'house_decoration', 'installments', 'seo', 'photos'));
    }

    /**
     * Обновление данных
     * @param Request $request
     */
    public function update(Request $request) {

        $house = $this->house->getById($request->get('id'));

        return $this->house->update($house, $request->all());

    }

    /**
     * Удаление
     * @param Request $request
     */
    public function delete(Request $request) {

        $house = $this->house->getById($request->get('id'));

        return $this->house->destroy($house);

    }

}