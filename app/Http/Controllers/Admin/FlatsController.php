<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\AdminItemContract;
use App\Repositories\FlatsRepository;

class FlatsController extends AdminController implements AdminItemContract {

    protected $flats;

    public function __construct(FlatsRepository $flats) {
        $this->flats = $flats;
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

        $houses = [];

        return view('admin.flats.create', compact('sales', 'houses'));
    }

    /**
     * Создание
     * @param Request $request
     */
    public function store(Request $request) {

        return $this->plans->store($request->all());

    }

    /**
     * Редактирование
     * @param $id
     * @return mixed
     */
    public function edit($id) {

        $plan = $this->plans->getById($id);

        $plans_type = $this->plans_type->getPlansTypesForSelect();

        $houses = $this->house->getHousesForSelect();

        $bathroom_types = $this->plans->getBathroomTypes();

        $balcony_types = $this->plans->getBalconyTypes();

        return view('admin.plans.edit', compact('plan', 'plans_type', 'houses', 'bathroom_types', 'balcony_types'));
    }

    /**
     * Обновление данных
     * @param Request $request
     */
    public function update(Request $request) {

        $plan = $this->plans->getById($request->get('id'));

        return $this->plans->update($plan, $request->all());

    }

    /**
     * Удаление
     * @param Request $request
     */
    public function delete(Request $request) {

        $plan = $this->plans->getById($request->get('id'));

        return $this->plans->destroy($plan);

    }

}