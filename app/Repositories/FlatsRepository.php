<?php
namespace App\Repositories;

use App\Models\Flat;

class FlatsRepository extends BaseRepository {

    public function __construct(Flat $flat) {

        $this->model = $flat;

    }

}