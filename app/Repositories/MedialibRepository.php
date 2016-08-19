<?php
namespace App\Repositories;

use Response;
use App\Models\Medialib;

class MedialibRepository extends BaseRepository {

    protected $image;

    public function __construct(Medialib $medialib, ImageRepository $image) {

        $this->model = $medialib;
        $this->image = $image;
    }

    /**
     * Сохранение файлов в медиабиблиотеку
     * @param $files
     * @param $object_id
     * @param $oblect_type
     */
    public function saveFiles($files, $object_id, $oblect_type) {

        foreach($files as $file) {
            if(!empty($file)) {
                try {
                    $image = $this->image->uploadImage($file);

                    $medialib = new $this->model;

                    $medialib->object_id = $object_id;
                    $medialib->object_type = $oblect_type;
                    $medialib->file = $image;

                    $medialib->save();

                } catch(\Exception $e) {
                    return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
                    die();
                }
            }
        }

    }

    /**
     * Удаление
     * @param $house
     */
    public function destroy($medialib) {

        try {

            $medialib->delete();

            return Response::json(['item' => true], 200);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }

}