<?php
namespace App\Http\Controllers\Admin;

use App\Repositories\BannersRepository;
use Illuminate\Http\Request;
use App\Contracts\AdminItemContract;

class BannersController extends AdminController implements AdminItemContract {

    protected $banners;

    public function __construct(BannersRepository $banners) {

        $this->banners = $banners;

    }

    /**
     * Главная страница
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request) {

        $banners = $this->banners->getBanners($request->all());

        return view('admin.banners.index', compact('banners'));

    }

    /**
     * Новый объект
     * @param $id
     * @return mixed
     */
    public function create() {

        $types = $this->banners->getTypes();

        $positions = $this->banners->getPositions();

        return view('admin.banners.create', compact('types', 'positions'));
    }

    /**
     * Создание
     * @param Request $request
     */
    public function store(Request $request) {

        return $this->banners->store($request->all());

    }

    /**
     * Редактирование
     * @param $id
     * @return mixed
     */
    public function edit($id) {

        $banner = $this->banners->getById($id);

        $types = $this->banners->getTypes();

        $positions = $this->banners->getPositions();

        return view('admin.banners.edit', compact('banner', 'types', 'positions'));
    }

    /**
     * Обновление данных
     * @param Request $request
     */
    public function update(Request $request) {

        $banner = $this->banners->getById($request->get('id'));

        return $this->banners->update($banner, $request->all());

    }

    /**
     * Удаление
     * @param Request $request
     */
    public function delete(Request $request) {

        $banner = $this->banners->getById($request->get('id'));

        return $this->banners->destroy($banner);

    }
}