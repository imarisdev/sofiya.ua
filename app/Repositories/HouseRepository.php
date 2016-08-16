<?php
namespace App\Repositories;

use Response;
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
     * Список домов для формы
     * @return array
     */
    public function getHousesForSelect() {
        $houses = $this->model->all();

        $houses_list = array();

        foreach($houses as $house) {
            $houses_list[$house->id] = $house->title;
        }

        return $houses_list;
    }

    /**
     * Сохранение
     * @param $house
     * @param $inputs
     * @return mixed
     */
    private function save($house, $inputs) {
        
        $house->title           = $inputs['title'];
        $house->status          = $inputs['status'];
        $house->street_id       = $inputs['street_id'];
        $house->complex_id      = $inputs['complex_id'];
        $house->is_rent         = $inputs['is_rent'];
        $house->number          = $inputs['number'];
        $house->is_installments = $inputs['is_installments'];
        $house->parking         = $inputs['parking'];
        $house->building_type   = $inputs['building_type'];
        $house->floors          = $inputs['floors'];
        $house->transport       = $inputs['transport'];
        $house->to_stop         = $inputs['to_stop'];
        $house->completion_at   = $inputs['completion_at'];
        $house->decoration      = $inputs['decoration'];
        $house->content         = $inputs['content'];

        if(empty($inputs['slug'])) {
            $house->slug = $this->createSlug($inputs['title']);;
        }

        try {

            $house->save();

            return Response::json(['item' => $house], 201);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }
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