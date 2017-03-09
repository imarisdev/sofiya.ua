<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\OptionsRepository;

class OptionsController extends AdminController {
    
    protected $options;

    public function __construct(OptionsRepository $options) {
        $this->options = $options;
    }

    /**
     * Главная страница
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request) {

        $options = $this->options->getAllOptions($request->all());

        return view('admin.options.index', compact('options'));

    }

    /**
     * Новый объект
     * @param $id
     * @return mixed
     */
    public function create() {

        return view('admin.options.create');
    }

    /**
     * Создание
     * @param Request $request
     */
    public function store(Request $request) {

        return $this->options->store($request->all());

    }

    /**
     * Редактирование
     * @param $id
     * @return mixed
     */
    public function edit($id) {

        $option = $this->options->getById($id);

        return view('admin.options.edit', compact('option'));
    }

    /**
     * Обновление данных
     * @param Request $request
     */
    public function update(Request $request) {

        $option = $this->options->getById($request->get('id'));

        return $this->options->update($option, $request->all());

    }

    /**
     * Удаление
     * @param Request $request
     */
    public function delete(Request $request) {

        $option = $this->options->getById($request->get('id'));

        return $this->options->destroy($option);

    }
}