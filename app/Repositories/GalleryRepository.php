<?php
namespace App\Repositories;

use App\Models\Gallery;
use Response;

class GalleryRepository extends BaseRepository {

    protected $medialib;

    public function __construct(Gallery $gallery, MedialibRepository $medialib) {

        $this->model = $gallery;
        $this->medialib = $medialib;
    }

    public function getAllGallery() {
        $gallery = $this->model
            ->get();

        return $gallery;
    }

    public function getById($id) {

        $item = $this->model->find($id);

        return $item;
    }

    /**
     * Метод сохранения
     * @param $user
     * @param $inputs
     * @return mixed
     */
    private function save($gallery, $inputs) {

        $gallery->title     = $inputs['title'];
        $gallery->content   = $inputs['content'];

        if(empty($inputs['slug'])) {
            $gallery->slug = $this->createSlug($inputs['title']);;
        }

        try {

            $gallery->save();

            if(!empty($inputs['slider'])) {
                $this->medialib->saveFiles($inputs['slider'], $gallery->id, 'gallery');
            }

            return Response::json(['item' => $gallery], 201);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }

    /**
     * Обновление данных
     * @param $inputs
     */
    public function update($gallery, $inputs) {

        return $this->save($gallery, $inputs);

    }

    /**
     * Создание
     * @param $inputs
     */
    public function store($inputs) {

        return $this->save(new $this->model, $inputs);

    }

    /**
     * Удаление
     * @param $house
     */
    public function destroy($gallery) {

        try {

            $gallery->delete();

            return Response::json(['item' => true], 200);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }


    /**
     * Реализовать через медиалибу
     * ID объекта это ID галереи
     * TYPE - gallery
     * Создать БД с галереями
     * Создать фильтры для данных [gallery id=1 title='']
     * Доделать функционал альтов картинок
     */

}