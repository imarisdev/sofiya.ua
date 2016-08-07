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

    private function saveHouse($house, $inputs) {

        $house->title = $inputs['title'];

        return $house;

    }

    /**
     * Обновление данных дома
     * @param $inputs
     */
    public function update($post, $inputs) {

        $house = $this->saveHouse($post, $inputs);

    }

    /**
     * Создание нового дома
     * @param $inputs
     */
    public function store($inputs) {

        $house = $this->saveHouse(new $this->model, $inputs);

    }

    /**
     * Удаляет дом
     * @param $house
     */
    public function destroy($house) {

        $house->delete();

    }
}