<?php
namespace App\Repositories;

use Response;
use App\Models\Video;

class VideoRepository extends BannersRepository {

    private $types = [
        1 => 'Комплекс',
        //2 => 'Дом'
    ];

    public function __construct(Video $video) {

        $this->model = $video;
    }

    /**
     * Список видео
     * @param null $request
     * @param int $limit
     * @return mixed
     */
    public function getVideo($request = null, $limit = 20) {

        $video = $this->model;

        if(!empty($request['object_type'])) {
            $video = $video->where('object_type', '=', $request['object_type']);
        }

        return $video->paginate($limit);
    }

    /**
     * Типы видео
     * @return array
     */
    public function getTypes() {
        return $this->types;
    }

    /**
     * Сохранение
     * @param $video
     * @param $inputs
     * @return mixed
     */
    private function save($video, $inputs) {

        $video->title         = $inputs['title'];
        $video->content       = $inputs['content'];
        $video->url           = $inputs['url'];
        $video->object_id     = $inputs['object_id'];
        $video->object_type   = $inputs['object_type'];

        try {

            $video->save();

            return Response::json(['item' => $video], 201);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }
    }

    /**
     * Обновление данных
     * @param $inputs
     */
    public function update($video, $inputs) {

        return $this->save($video, $inputs);

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
    public function destroy($video) {

        try {

            $video->delete();

            return Response::json(['item' => true], 200);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }

}