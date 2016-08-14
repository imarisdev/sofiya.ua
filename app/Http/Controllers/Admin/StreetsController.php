<?php
namespace App\Http\Controllers\Admin;

use App\Repositories\StreetRepository;
use Illuminate\Http\Request;
use App\Contracts\AdminItemContract;

class StreetsController extends AdminController implements AdminItemContract {

    protected $street;

    public function __construct(StreetRepository $street) {

        $this->street = $street;

    }

    /**
     * Главная страница комплексов
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request) {

        $streets = $this->street->getStreets($request->all());

        return view('admin.streets.index', compact('streets'));

    }

    /**
     * Новый объект
     * @param $id
     * @return mixed
     */
    public function create() {

        return view('admin.streets.create');
    }

    /**
     * Создание
     * @param Request $request
     */
    public function store(Request $request) {

        return $this->street->store($request->all());

    }

    /**
     * Редактирование
     * @param $id
     * @return mixed
     */
    public function edit($id) {

        $street = $this->street->getById($id);

        return view('admin.streets.edit', compact('street'));
    }

    /**
     * Обновление данных
     * @param Request $request
     */
    public function update(Request $request) {

        $street = $this->street->getById($request->get('id'));

        return $this->street->update($street, $request->all());

    }

    /**
     * Удаление
     * @param Request $request
     */
    public function delete(Request $request) {

        $street = $this->street->getById($request->get('id'));

        return $this->street->destroy($street);

    }
}