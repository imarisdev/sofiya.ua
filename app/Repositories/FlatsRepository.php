<?php
namespace App\Repositories;

use Auth;
use Response;
use App\Models\Flat;

class FlatsRepository extends BaseRepository {

    protected $image;

    protected $sales = [
        0 => 'Черновик',
        1 => 'Новая квартира',
        2 => 'Бронь',
        3 => 'Под задатком',
        4 => 'Продана'
    ];

    public function __construct(Flat $flat, ImageRepository $image) {

        $this->model = $flat;

    }

    /**
     * Квартиры
     * @param null $request
     * @param int $limit
     * @return mixed
     */
    public function getFlats($request = null, $limit = 20) {
        $flats = $this->model;

        if(!empty($request['status'])) {
            $flats = $flats->where('status', '=', $request['status']);
        }

        if(!empty($request['house_id'])) {
            $flats = $flats->where('house_id', '=', $request['house_id']);
        }

        return $flats->paginate($limit);
    }

    /**
     * Статус продажи квартир
     * @return array
     */
    public function getSales() {
        return $this->sales;
    }

    /**
     * Сохранение
     * @param $house
     * @param $inputs
     * @return mixed
     */
    private function save($flat, $inputs) {

        $flat->title           = $inputs['title'];
        $flat->status          = $inputs['status'];
        $flat->house_id        = $inputs['house_id'];
        $flat->plan_id         = $inputs['plan_id'];
        $flat->manager_id      = !empty($inputs['manager_id']) ? $inputs['manager_id'] : Auth::user()->id;
        $flat->floor           = $inputs['floor'];
        $flat->number          = $inputs['number'];
        $flat->content         = $inputs['content'];
        $flat->comment         = $inputs['comment'];

        if(!empty($inputs['image'])) {
            $flat->image = $this->image->uploadImage($inputs['image'][0]);
        }

        try {

            $flat->save();

            return Response::json(['item' => $flat], 201);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }
    }

    /**
     * Обновление данных
     * @param $inputs
     */
    public function update($flat, $inputs) {

        return $this->save($flat, $inputs);

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
     * @param $flat
     */
    public function destroy($flat) {

        try {

            $flat->delete();

            return Response::json(['item' => true], 200);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }
}