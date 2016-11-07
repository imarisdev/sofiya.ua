<?php
namespace App\Repositories;

use Response;
use App\Models\Street;

class StreetRepository extends BaseRepository {

    public function __construct(Street $street) {

        $this->model = $street;

    }

    /**
     * Список улиц
     * @param null $request
     * @param int $limit
     * @return mixed
     */
    public function getStreets($request = null, $limit = 20) {

        $street = $this->model;

        return $street->paginate($limit);

    }

    /**
     * Список улиц для формы
     * @return array
     */
    public function getStreetsForSelect() {
        $streets = $this->model->all();

        $streets_list = array();

        foreach($streets as $street) {
            $streets_list[$street->id] = $street->title;
        }

        return $streets_list;
    }


    /**
     * Метод сохранения
     * @param $user
     * @param $inputs
     * @return mixed
     */
    private function save($street, $inputs) {

        $street->title = $inputs['title'];
        $street->path = $inputs['path'];
        $street->content = $inputs['content'];
        //$street->geo = $inputs['geo'];

        if(empty($inputs['slug'])) {
            $street->slug = $this->createSlug($inputs['title']);;
        } else {
            $street->slug = $inputs['slug'];
        }

        try {

            $street->save();

            return Response::json(['item' => $street], 201);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }

    /**
     * Обновление данных
     * @param $inputs
     */
    public function update($street, $inputs) {

        return $this->save($street, $inputs);

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
    public function destroy($complex) {

        try {

            $complex->delete();

            return Response::json(['item' => true], 200);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }

}