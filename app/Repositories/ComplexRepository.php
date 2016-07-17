<?php
namespace App\Repositories;

use App\Models\Complex;

class ComplexRepository extends BaseRepository {

    public function __construct(Complex $complex) {

        $this->model = $complex;

    }

}