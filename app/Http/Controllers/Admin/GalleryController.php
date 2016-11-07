<?php
namespace App\Http\Controllers\Admin;

use App\Repositories\GalleryRepository;
use App\Repositories\MedialibRepository;
use Illuminate\Http\Request;

class GalleryController extends AdminController {

    protected $gallery;
    protected $medialib;

    public function __construct(GalleryRepository $gallery, MedialibRepository $medialib) {

        $this->gallery = $gallery;
        $this->medialib = $medialib;
    }

    /**
     * Главная страница
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request) {

        $gallery = $this->gallery->getAllGallery($request->all());

        return view('admin.gallery.index', compact('gallery'));

    }

    /**
     * Новый объект
     * @param $id
     * @return mixed
     */
    public function create() {

        return view('admin.gallery.create');
    }

    /**
     * Создание
     * @param Request $request
     */
    public function store(Request $request) {

        return $this->gallery->store($request->all());

    }

    /**
     * Редактирование
     * @param $id
     * @return mixed
     */
    public function edit($id) {

        $gallery = $this->gallery->getById($id);

        $photos = $this->medialib->getFiles(['object_id' => $gallery->id, 'object_type' => 'gallery']);

        return view('admin.gallery.edit', compact('gallery', 'photos'));
    }

    /**
     * Обновление данных
     * @param Request $request
     */
    public function update(Request $request) {

        $gallery= $this->gallery->getById($request->get('id'));

        return $this->gallery->update($gallery, $request->all());

    }

    /**
     * Удаление
     * @param Request $request
     */
    public function delete(Request $request) {

        $gallery = $this->gallery->getById($request->get('id'));

        return $this->gallery->destroy($gallery);

    }

}