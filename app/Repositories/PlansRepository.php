<?php
namespace App\Repositories;

use App\Models\Plan;

class PlansRepository extends BaseRepository {

    public function __construct(Plan $plan) {

        $this->model = $plan;

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