<?php
namespace App\Repositories;

use Response;
use App\Models\Plans;

class PlansRepository extends BaseRepository {

    public function __construct(Plans $plans) {

        $this->model = $plans;

    }

    /**
     * Возвращает планировки по типу
     * @param $type_id
     * @return mixed
     */
    public function getPlansByType($type_id, $complex, $limit = 20) {

        $plans = $this->model
            ->where('plans_type', '=', $type_id)
            ->get();

        return $plans;
    }

    /**
     * Список планировок
     * @param null $request
     * @param int $limit
     * @return mixed
     */
    public function getPlans($request = null, $limit = 20) {

        $plans = $this->model;

        if(!empty($request['plans_type'])) {
            $plans = $plans->where('plans_type', '=', $request['plans_type']);
        }

        if(!empty($request['house_id'])) {
            $plans = $plans->where('house_id', '=', $request['house_id']);
        }

        return $plans->paginate($limit);
    }

    /**
     * Изменение кол-ва планировок в доме
     * @param $plan
     * @param string $operator
     */
    public function changeFlatsCout($plan, $operator = '--') {

        $plan->flats_count = $plan->flats_count . $operator . 1;

        $plan->save();
    }

    /**
     * Сохранение
     * @param $house
     * @param $inputs
     * @return mixed
     */
    private function save($plan, $inputs) {

        $plan->title           = $inputs['title'];
        $plan->status          = $inputs['status'];
        $plan->plans_type      = $inputs['plans_type'];
        $plan->house_id        = $inputs['house_id'];
        $plan->flats_count     = $inputs['flats_count'];
        $plan->area            = $inputs['area'];
        $plan->live            = $inputs['live'];
        $plan->kitchen         = $inputs['kitchen'];
        $plan->bathroom        = $inputs['bathroom'];
        $plan->balcony         = $inputs['balcony'];
        $plan->content         = $inputs['content'];

        if(empty($inputs['slug'])) {
            $plan->slug = $this->createSlug($inputs['title']);;
        }

        try {

            $plan->save();

            return Response::json(['item' => $plan], 201);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }
    }

    /**
     * Обновление данных
     * @param $inputs
     */
    public function update($plan, $inputs) {

        return $this->save($plan, $inputs);

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
    public function destroy($plan) {

        try {

            $plan->delete();

            return Response::json(['item' => true], 200);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }

}