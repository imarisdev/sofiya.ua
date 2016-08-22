<?php
namespace App\Http\Controllers\Admin;

use App\Repositories\PagesRepository;
use Illuminate\Http\Request;
use App\Contracts\AdminItemContract;

class PagesController extends AdminController implements AdminItemContract {

    protected $pages;

    public function __construct(PagesRepository $pages) {

        $this->pages = $pages;

    }

    /**
     * Главная страница
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request) {

        $pages = $this->pages->getPages($request->all());

        return view('admin.pages.index', compact('pages'));

    }

    /**
     * Новый объект
     * @param $id
     * @return mixed
     */
    public function create() {

        return view('admin.pages.create');
    }

    /**
     * Создание
     * @param Request $request
     */
    public function store(Request $request) {

        return $this->pages->store($request->all());

    }

    /**
     * Редактирование
     * @param $id
     * @return mixed
     */
    public function edit($id) {

        $page = $this->pages->getById($id);

        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Обновление данных
     * @param Request $request
     */
    public function update(Request $request) {

        $page = $this->pages->getById($request->get('id'));

        return $this->pages->update($page, $request->all());

    }

    /**
     * Удаление
     * @param Request $request
     */
    public function delete(Request $request) {

        $page = $this->pages->getById($request->get('id'));

        return $this->pages->destroy($page);

    }
}