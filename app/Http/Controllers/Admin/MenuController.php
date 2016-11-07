<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\MenuRepository;
use Illuminate\Http\Request;

class MenuController extends AdminController {

    protected $menu;

    public function __construct(MenuRepository $menu) {

        $this->menu = $menu;
    }

    /**
     * Главная страница
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request) {

        $menu = $this->menu->getMenuPositions();

        return view('admin.menu.index', compact('menu'));

    }

    /**
     * Новый объект
     * @param $id
     * @return mixed
     */
    public function create() {

        $positions = $this->menu->getMenuPositions();

        return view('admin.menu.create', compact('positions'));
    }

    /**
     * Создание
     * @param Request $request
     */
    public function store(Request $request) {

        return $this->menu->store($request->all());

    }

    /**
     * Редактирование
     * @param $id
     * @return mixed
     */
    public function edit($id) {

        $menu = $this->menu->getById($id);


        $positions = $this->menu->getMenuPositions();

        return view('admin.menu.edit', compact('menu', 'positions'));
    }

    /**
     * Сортировка меню
     * @param $id
     * @return mixed
     */
    public function sort($type) {

        $menu = $this->menu->getMenu($type, true);

        $menu_type = $this->menu->getMenuPositions()[$type];

        return view('admin.menu.sort', compact('menu', 'menu_type'));
    }

    /**
     * Обновление данных
     * @param Request $request
     */
    public function update(Request $request) {

        $menu = $this->menu->getById($request->get('id'));

        return $this->menu->update($menu, $request->all());

    }

    /**
     * Обновление структуры меню
     * @param Request $request
     * @return mixed
     */
    public function rebuild(Request $request) {
        return $this->menu->rebuild($request->all());
    }

    /**
     * Удаление
     * @param Request $request
     */
    public function delete(Request $request) {

        $menu = $this->menu->getById($request->get('id'));

        return $this->menu->destroy($menu);

    }

}