<?php
namespace App\Http\Controllers\Admin;

use App\Repositories\RedirectsRepository;
use Illuminate\Http\Request;
use App\Contracts\AdminItemContract;

class RedirectsController extends AdminController implements AdminItemContract {

    protected $redirects;

    public function __construct(RedirectsRepository $redirects) {
        $this->redirects = $redirects;
    }

    /**
     * Главная страница
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request) {

        $redirects = $this->redirects->getRedirectsByPage($request->all());

        return view('admin.redirects.index', compact('redirects'));

    }

    /**
     * Новый объект
     * @param $id
     * @return mixed
     */
    public function create() {

        return view('admin.redirects.create');
    }

    /**
     * Создание
     * @param Request $request
     */
    public function store(Request $request) {

        return $this->redirects->store($request->all());

    }

    /**
     * Редактирование
     * @param $id
     * @return mixed
     */
    public function edit($id) {

        $redirect = $this->redirects->getById($id);

        return view('admin.redirects.edit', compact('redirect'));
    }

    /**
     * Обновление данных
     * @param Request $request
     */
    public function update(Request $request) {

        $redirect = $this->redirects->getById($request->get('id'));

        return $this->redirects->update($redirect, $request->all());

    }

    /**
     * Удаление
     * @param Request $request
     */
    public function delete(Request $request) {

        $redirect = $this->redirects->getById($request->get('id'));

        return $this->redirects->destroy($redirect);

    }

}