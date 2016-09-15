<?php
namespace App\Repositories;

use Response;
use App\Models\Plans;

class PlansRepository extends BaseRepository {

    protected $image;

    private $bathroom_types = [
        0 => 'Нету',
        1 => 'Смежный',
        2 => 'Раздельный'
    ];

    private $balcony_types = [
        0 => 'Нету',
        1 => 'Есть',
        2 => '2 балкона'
    ];

    public function __construct(Plans $plans, ImageRepository $image) {

        $this->model = $plans;
        $this->image = $image;
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
     * Планировки для формы
     * @param null $request
     * @return mixed
     */
    public function getPlansForSelect($request = null) {

        $plans = $this->model;

        if(!empty($request['house_id'])) {
            $plans = $plans->where('house_id', '=', $request['house_id']);
        }

        return $plans->get()->pluck('title', 'id');
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
     * Типы сан. узла
     * @return array
     */
    public function getBathroomTypes() {
        return $this->bathroom_types;
    }

    /**
     * Балконы
     * @return array
     */
    public function getBalconyTypes() {
        return $this->balcony_types;
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
        $plan->rooms           = $inputs['rooms'];
        $plan->area            = $inputs['area'];
        $plan->live            = $inputs['live'];
        $plan->kitchen         = $inputs['kitchen'];
        $plan->bathroom_area   = $inputs['bathroom_area'];
        $plan->bathroom        = $inputs['bathroom'];
        $plan->balcony         = $inputs['balcony'];
        $plan->content         = $inputs['content'];

        if(empty($inputs['slug'])) {
            $plan->slug = $this->createSlug($inputs['title']);;
        }

        if(!empty($inputs['image'])) {
            $plan->image = $this->image->uploadImage($inputs['image'][0]);
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