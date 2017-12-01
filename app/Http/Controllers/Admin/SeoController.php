<?php
namespace App\Http\Controllers\Admin;

use App\Repositories\SeoRepository;
use Illuminate\Http\Request;

class SeoController extends AdminController {

    protected $seo;

    public function __construct(SeoRepository $seo) {

        $this->seo = $seo;
    }

    /**
     * Главная страница комплексов
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request) {

        $seo = $this->seo->getAllSeo($request->all());

        $types = $this->seo->getTypes();

        return view('admin.seo.index', compact('seo', 'types'));

    }

    /**
     * Генератор SEO-данных
     * @param Request $request
     * @return mixed
     */
    public function generate(Request $request) {

        return view('admin.seo.generate');
    }

    /**
     * Генерация SEO-данных
     * @param Request $request
     * @return mixed
     */
    public function generateStore(Request $request) {
        return $this->seo->generateStore($request->all());
    }

    /**
     * Редактирование
     * @param $id
     * @return mixed
     */
    public function edit($id) {

        $seo = $this->seo->getById($id);

        $types = $this->seo->getTypes();

        return view('admin.seo.edit', compact('seo', 'types'));
    }

    /**
     * Новый объект
     * @param $id
     * @return mixed
     */
    public function create() {

        $types = $this->seo->getTypes();

        return view('admin.seo.create', compact('types'));
    }

    /**
     * Создание
     * @param Request $request
     */
    public function store(Request $request) {

        return $this->seo->store($request->all());

    }

    /**
     * Обновление данных
     * @param Request $request
     */
    public function update(Request $request) {

        $seo = $this->seo->getById($request->get('id'));

        return $this->seo->update($seo, $request->all());

    }

    /**
     * Удаление
     * @param Request $request
     */
    public function delete(Request $request) {

        $seo = $this->seo->getById($request->get('id'));

        return $this->seo->destroy($seo);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request) {

        $seo = [];

        $query = $request->get('query', null);
        $objectType = $request->get('object_type', null);;

        if ($query) {
            $seo = $this->seo->search($query, $objectType);
        }

        $types = $this->seo->getTypes();

        return view('admin.seo.search', compact('seo', 'types'));
    }
}