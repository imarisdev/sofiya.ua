<?php
namespace App\Repositories;

use DB;
use View;
use Response;
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

        if(!empty($params) && !empty($seo)) {

            foreach($params as $key => $param) {
                $seo->title = str_replace("%{$key}%", $param, $seo->title);
                $seo->h1 = str_replace("%{$key}%", $param, $seo->h1);
                $seo->description = str_replace("%{$key}%", $param, $seo->description);
                $seo->keywords = str_replace("%{$key}%", $param, $seo->keywords);
            }

        }

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
     * Все SEO параметры
     * @param null $request
     * @param int $limit
     * @return mixed
     */
    public function getAllSeo($request = null, $limit = 20) {

        $seo = $this->model;

        if(!empty($request['object_type'])) {
            $seo = $seo->where('object_type', '=', $request['object_type']);
        }

        if(!empty($request['object_id'])) {
            $seo = $seo->where('object_id', '=', $request['object_id']);
        }

        return $seo->paginate($limit);
    }

    /**
     * Типы объектов
     * @return array
     */
    public function getTypes() {

        $types = $this->model
            ->select('object_type')
            ->groupBy('object_type')
            ->get();

        return $types;
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

            return Response::json(['item' => $seo], 201);
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
     * Создание через генератор
     * @param $inputs
     */
    public function generateStore($inputs) {

        if($inputs['action'] == 'all') {
            $this->model
                ->where('object_type', '=', $inputs['object_type'])
                ->delete();


            $items = DB::table($inputs['object_type'])
                ->select('id')
                ->get();

            foreach ($items as $item) {

                $data = $data = $this->processGenerate($item->id, $inputs);

                $this->store($data);

            }

        } else {

            $seo_items = DB::table('seo')
                ->select('object_id')
                ->where('object_type', '=', $inputs['object_type'])
                ->get();

            $seo_items_ids = [];

            foreach($seo_items as $item) {
                $seo_items_ids[] = $item->object_id;
            }

            $items = DB::table($inputs['object_type'])
                ->select('id')
                ->whereNotIn('id', $seo_items_ids)
                ->get();

            foreach ($items as $item) {

                $data = $this->processGenerate($item->id, $inputs);

                $this->store($data);

            }

        }

    }

    /**
     * Обработка генерации метатегов
     * @param $object_id
     * @param $inputs
     * @return array
     */
    public function processGenerate($object_id, $inputs) {

        $reg = "/\{([а-яА-Я0-9\|\-\s]+)\}/iu";

        $data = [];

        $data['object_id'] = $object_id;
        $data['object_type'] = $inputs['object_type'];
        $data['content'] = null;

        $data['title'] = preg_replace_callback($reg, function($matches) {
            $values = explode('|', $matches[1]);
            return $values[array_rand($values)];
        }, $inputs['title']);

        $data['h1'] = preg_replace_callback($reg, function($matches) {
            $values = explode('|', $matches[1]);
            return $values[array_rand($values)];
        }, $inputs['h1']);

        $data['description'] = preg_replace_callback($reg, function($matches) {
            $values = explode('|', $matches[1]);
            return $values[array_rand($values)];
        }, $inputs['description']);

        $data['keywords'] = preg_replace_callback($reg, function($matches) {
            $values = explode('|', $matches[1]);
            return $values[array_rand($values)];
        }, $inputs['keywords']);

        return $data;
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