<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\AdminItemContract;
use App\Repositories\HouseRepository;

class HousesController extends AdminController implements AdminItemContract {

    protected $house;

    public function __construct(HouseRepository $house) {

        $this->house = $house;

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

        return view('admin.houses.create');
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

        return view('admin.houses.edit', compact('house'));
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