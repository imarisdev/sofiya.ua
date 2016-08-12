<?php
namespace App\Http\Controllers\Admin;

use App\Contracts\AdminItemContract;
use Illuminate\Http\Request;
use App\Repositories\ComplexRepository;

class ComplexController extends AdminController implements AdminItemContract {

    protected $complex;

    public function __construct(ComplexRepository $complex) {

        $this->complex = $complex;

    }

    /**
     * Главная страница комплексов
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request) {

        $complexes = $this->complex->getAllComplexes($request->all());

        return view('admin.complex.index', compact('complexes'));

    }

    /**
     * Новый объект
     * @param $id
     * @return mixed
     */
    public function create() {

        return view('admin.complex.create');
    }

    /**
     * Создание
     * @param Request $request
     */
    public function store(Request $request) {

        return $this->complex->store($request->all());

    }

    /**
     * Редактирование
     * @param $id
     * @return mixed
     */
    public function edit($id) {

        $complex = $this->complex->getById($id);

        return view('admin.complex.edit', compact('complex'));
    }

    /**
     * Обновление данных
     * @param Request $request
     */
    public function update(Request $request) {

        $complex = $this->complex->getById($request->get('id'));

        return $this->complex->update($complex, $request->all());

    }

    /**
     * Удаление
     * @param Request $request
     */
    public function delete(Request $request) {

        $complex = $this->complex->getById($request->get('id'));

        return $this->complex->destroy($complex);

    }

}