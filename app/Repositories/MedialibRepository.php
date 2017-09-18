<?php
namespace App\Repositories;

use Mockery\Exception;
use Response;
use App\Models\Medialib;

class MedialibRepository extends BaseRepository {

    protected $image;

    public function __construct(Medialib $medialib, ImageRepository $image) {

        $this->model = $medialib;
        $this->image = $image;
    }

    /**
     * Список файлов
     * @param $object_id
     * @param $oblect_type
     * @return mixed
     */
    public function getFiles($request = null, $limit = 100) {

        $files = $this->model
            ->select('id', 'file', 'title', 'created_at', 'object_type', 'object_id');

        if(!empty($request['object_type'])) {
            $files->where('object_type', '=', $request['object_type']);
        }

        if(!empty($request['object_id'])) {
            $files->where('object_id', '=', $request['object_id']);
        }

        $files->orderBy('created_at', 'asc');
        $files->take($limit);

        $images = $files->get();

        foreach ($images as $key => $file) {
            $item = @unserialize($file->file);
            if (!$item) {
                unset($images{$key});
                continue;
            }
            $images{$key}->info = $this->image->getImageInfo(public_path() . $item['file'] . $item['ext']);
            /*$item = @unserialize($file->file);
            $item['id'] = $file->id;
            $item['info'] = $this->image->getImageInfo(public_path() . $item['file'] . $item['ext']);

            $images[] = $item;*/
        }

        return $images;
    }

    /**
     * Сохранение файлов в медиабиблиотеку
     * @param $file
     * @param $object_id
     * @param $oblect_type
     */
    public function saveFiles($file, $object_id = null, $oblect_type = null) {
        if(!empty($file)) {
            try {
                $image = $this->image->uploadImage($file);

                if (empty($image)) {
                    return Response::json(['error' => true, 'msg' => array('Error in save image file')], 400);
                }

                $medialib = new $this->model;

                if ($object_id) {
                    $medialib->object_id = $object_id;
                }
                if ($oblect_type) {
                    $medialib->object_type = $oblect_type;
                }
                $medialib->file = @serialize($image);

                $medialib->save();

                $imge_info = $this->image->getImageInfo($file);

                $file = $image;
                $file['id'] = $medialib->id;
                $file['title'] = $medialib->title;
                $file['info'] = $imge_info;

                return Response::json(['file' => $file], 201);

            } catch(\Exception $e) {
                return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
                die();
            }
        }
    }

    /**
     * @param $files
     * @param null $object_id
     * @param null $oblect_type
     * @return array|bool
     */
    public function saveSliderImages($files, $object_id = null, $oblect_type = null) {

        if(empty($files)) {
            throw new Exception('Empty file');
        }

        $filesList = [];

        foreach ($files as $file) {
            $image = $this->image->uploadImage($file);

            if (empty($image)) {
                throw new Exception('Error in save image file');
            }

            $medialib = new $this->model;

            if ($object_id) {
                $medialib->object_id = $object_id;
            }
            if ($oblect_type) {
                $medialib->object_type = $oblect_type;
            }
            $medialib->file = @serialize($image);

            try {
                $medialib->save();
            } catch(\Exception $e) {
                throw new Exception($e->getMessage());
            }

            $imge_info = $this->image->getImageInfo($file);

            $file = $image;
            $file['id'] = $medialib->id;
            $file['title'] = $medialib->title;
            $file['info'] = $imge_info;

            $filesList[] = $file;
        }

        return $filesList;
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


    /**
     * @param null $request
     * @return mixed
     */
    public function getPhotosByComplex($request = null) {
        $medialib = $this->model
            ->select('*');

        if(!empty($request['object_type'])) {
            $medialib->where('object_type', '=', $request['object_type']);
        }

        $photos = [];

        foreach($medialib->get() as $item) {
            $photos[$item->object_id]['photos'][] = $item;
        }

        return $photos;
    }

    public function getFileInfo($request = null) {
        $medialib = $this->model->find($request['id']);

        $medialib->file = @unserialize($medialib->file);

        $file = public_path() . $medialib->file['file'] . $medialib->file['ext'];
        $medialib->info = $this->image->getImageInfo($file);

        return Response::json(['medialib' => $medialib], 200);
    }

}