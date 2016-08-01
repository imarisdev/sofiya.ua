<?php
namespace App\Repositories;

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
    public function getPlansByType($type_id, $limit = 20) {

        $plans = $this->model->where('plans_type', '=', $type_id)->get();

        return $plans;
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

}