<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\MedialibRepository;
use Illuminate\Http\Request;

class MedialibController extends AdminController {

    protected $medialib;

    public function __construct(MedialibRepository $medialib) {
        $this->medialib = $medialib;
    }

    /**
     * Загрузка файла
     * @param Request $request
     * @return mixed
     */
    public function upload(Request $request) {
        return $this->medialib->saveFiles($request->file('images'), $request->get('object_id'), $request->get('object_type'));
    }

    /**
     * Информация о файле
     * @param Request $request
     * @return mixed
     */
    public function info(Request $request) {
        return $this->medialib->getFileInfo($request->all());
    }

    /**
     * Удаление
     * @param Request $request
     * @return mixed
     */
    public function delete(Request $request) {
        $medialib = $this->medialib->getById($request->get('id'));

        return $this->medialib->destroy($medialib);
    }

    /**
     * Картинки объекта
     * @param Request $request
     * @return mixed
     */
    public function load(Request $request) {
        return $this->medialib->getFiles($request->all());
    }
}