<?php
namespace App\Http\Controllers\Admin;

use App\Contracts\AdminItemContract;
use App\Repositories\SeoRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Repositories\ComplexRepository;

class ComplexController extends AdminController implements AdminItemContract {

    protected $complex;
    protected $user;
    protected $seo;

    public function __construct(ComplexRepository $complex, UserRepository $user, SeoRepository $seo) {

        $this->complex = $complex;
        $this->user = $user;
        $this->seo = $seo;
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

        $owners = $this->user->getUsersForSelect();

        return view('admin.complex.create', compact('owners'));
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

        $owners = $this->user->getUsersForSelect();

        $seo = $this->seo->getSeoItem($id, 'complex');

        return view('admin.complex.edit', compact('complex', 'owners', 'seo'));
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