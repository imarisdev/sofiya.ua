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
     * Поиск квартир
     * @param null $request
     * @param int $limit
     */
    public function searchFlats($request = null, $limit = 20) {

        $flats = $this->model
            ->select(
                'flats.id',
                'flats.title',
                'flats.house_id',
                'flats.plan_id',
                'flats.floor',
                'flats.number',
                'flats.status',
                'flats.comment',
                'flats.sale_at',
                'flats.section',
                'flats.number_bti',
                'complex.id as complex_id',
                'plans.area',
                'plans.area_bti',
                'plans.live',
                'plans.kitchen',
                'plans.plans_type',
                'plans.rooms',
                'houses.id as houses_id',
                'houses.slug as houses_slug',
                'houses.number as houses_number',
                'houses.manager_id',
                'houses.completion_at',
                'streets.title as street_title',
                'users.name',
                'users.id as user_id'
            )
            ->leftJoin('houses', 'houses.id', '=', 'flats.house_id')
            ->leftJoin('plans', 'plans.id', '=', 'flats.plan_id')
            ->leftJoin('complex', 'complex.id', '=', 'houses.complex_id')
            ->leftJoin('users', 'users.id', '=', 'houses.manager_id')
            ->leftJoin('streets', 'streets.id', '=', 'houses.street_id');

        if(!empty($request['house_id'])) {
            $flats->where('flats.house_id', '=', $request['house_id']);
        }

        if(!empty($request['complex_id'])) {
            $flats->where('complex.id', '=', $request['complex_id']);
        }

        if(!empty($request['plans_type'])) {
            $flats->where('plans.plans_type', '=', $request['plans_type']);
        }

        if(!empty($request['is_rent'])) {
            $flats->where('houses.is_rent', '=', $request['is_rent']);
        }

        if(!empty($request['area_from'])) {
            $flats->where('plans.area', '>=', $request['area_from']);
        }

        if(!empty($request['area_to'])) {
            $flats->where('plans.area', '<=', $request['area_to']);
        }

        if(!empty($request['floor_from'])) {
            $flats->where('flats.floor', '>=', $request['floor_from']);
        }

        if(!empty($request['floor_to'])) {
            $flats->where('flats.floor', '<=', $request['floor_to']);
        }

        $flats->where('flats.status', '>', 0);

        $manager_ids[] = Auth::user()->id;

        foreach(Auth::user()->subordinates as $users) {
            $manager_ids[] = $users->id;
        }

        $flats->whereIn('houses.manager_id', $manager_ids);

        $flats->orderBy('flats.id');

        return $flats->paginate($limit);
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
        //$flat->number_bti      = $inputs['number_bti'];
        $flat->content         = $inputs['content'];
        $flat->comment         = $inputs['comment'];
        $flat->sale_at         = $inputs['sale_at'];
        //$flat->section         = $inputs['section'];

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