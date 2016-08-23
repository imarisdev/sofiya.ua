<?php
namespace App\Repositories;

use View;
use App\Models\Seo;

class SeoRepository extends BaseRepository {

    public function __construct(Seo $seo) {

        $this->model = $seo;

    }

    /**
     * Обработка данных для передачи к шаблон
     * @param $object_id
     * @param $object_type
     * @param null $params
     */
    public function getSeoData($object_id, $object_type, $params = null) {

        $seo = $this->model
            ->where('object_id', '=', $object_id)
            ->where('object_type', '=', $object_type)
            ->first();

        View::share(['seo' => $seo]);
    }

    /**
     * SEO данные по объекту
     * @param $object_id
     * @param $object_type
     * @return mixed
     */
    public function getSeoItem($object_id, $object_type) {

        $seo = $this->model
            ->where('object_id', '=', $object_id)
            ->where('object_type', '=', $object_type)
            ->first();

        return $seo;

    }

    /**
     * Метод сохранения
     * @param $user
     * @param $inputs
     * @return mixed
     */
    private function save($seo, $inputs) {

        $seo->object_id     = $inputs['object_id'];
        $seo->object_type   = $inputs['object_type'];
        $seo->title         = $inputs['title'];
        $seo->description   = $inputs['description'];
        $seo->keywords      = $inputs['keywords'];
        $seo->h1            = $inputs['h1'];
        $seo->content       = $inputs['content'];

        try {

            $seo->save();

            //return Response::json(['item' => $seo], 201);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }

    /**
     * Обновление данных
     * @param $inputs
     */
    public function update($seo, $inputs) {

        return $this->save($seo, $inputs);

    }

    /**
     * Создание
     * @param $inputs
     */
    public function store($inputs) {

        return $this->save(new $this->model, $inputs);

    }

    /**
     * Выбор метода обработки
     * @param $inputs
     * @return mixed
     */
    public function process($inputs) {
        if(isset($inputs['id']) && !empty($inputs['id'])) {

            $seo = $this->getById($inputs['id']);

            return $this->update($seo, $inputs);
        } else {
            return $this->store($inputs);
        }
    }

    /**
     * Удаление
     * @param $house
     */
    public function destroy($seo) {

        try {

            $seo->delete();

            return Response::json(['item' => true], 200);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }

}