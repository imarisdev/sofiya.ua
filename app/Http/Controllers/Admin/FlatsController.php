<?php
namespace App\Http\Controllers\Admin;

use App\Repositories\HouseRepository;
use App\Repositories\PlansRepository;
use Illuminate\Http\Request;
use App\Contracts\AdminItemContract;
use App\Repositories\FlatsRepository;

class FlatsController extends AdminController implements AdminItemContract {

    protected $flats;
    protected $house;
    protected $plans;

    public function __construct(FlatsRepository $flats, HouseRepository $house, PlansRepository $plans) {
        $this->flats = $flats;
        $this->house = $house;
        $this->plans = $plans;
    }

    /**
     * Главная страница
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request) {

        $flats = $this->flats->getFlats($request->all());

        return view('admin.flats.index', compact('flats'));

    }

    /**
     * Новый объект
     * @param $id
     * @return mixed
     */
    public function create() {

        $sales = $this->flats->getSales();

        $houses = $this->house->getHousesForSelect();

        return view('admin.flats.create', compact('sales', 'houses'));
    }

    /**
     * Создание
     * @param Request $request
     */
    public function store(Request $request) {

        return $this->flats->store($request->all());

    }

    /**
     * Редактирование
     * @param $id
     * @return mixed
     */
    public function edit($id) {

        $flat = $this->flats->getById($id);

        $sales = $this->flats->getSales();

        $houses = $this->house->getHousesForSelect();

        $plans = $this->plans->getPlansForSelect(['house_id' => $flat->house_id]);

        return view('admin.flats.edit', compact('flat', 'sales', 'houses', 'plans'));
    }

    /**
     * Обновление данных
     * @param Request $request
     */
    public function update(Request $request) {

        $flat = $this->flats->getById($request->get('id'));

        return $this->flats->update($flat, $request->all());

    }

    /**
     * Удаление
     * @param Request $request
     */
    public function delete(Request $request) {

        $flat = $this->flats->getById($request->get('id'));

        return $this->flats->destroy($flat);

    }

}