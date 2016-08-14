<?php
namespace App\Repositories;

use App\Models\House;

class HouseRepository extends BaseRepository {

    public function __construct(House $house) {

        $this->model = $house;

    }

    /**
     * Дома комплекса
     * @param $complex_id
     * @return mixed
     */
    public function getByComplexId($complex_id) {

        $houses = $this->model
            ->where('complex_id', '=', $complex_id)
            ->get();

        return $houses;
    }

    /**
     * Список домов
     * @param null $request
     * @param int $limit
     * @return mixed
     */
    public function getHouses($request = null, $limit = 20) {

        $house = $this->model;

        return $house->paginate($limit);
    }

    /**
     * Сохранение
     * @param $house
     * @param $inputs
     * @return mixed
     */
    private function save($house, $inputs) {

        $house->title = $inputs['title'];

        if(empty($inputs['slug'])) {
            $house->slug = $this->createSlug($inputs['title']);;
        }

        return $house;

    }

    /**
     * Обновление данных
     * @param $inputs
     */
    public function update($house, $inputs) {

        return $this->save($house, $inputs);

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
    public function destroy($house) {

        try {

            $house->delete();

            return Response::json(['item' => true], 200);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }
}