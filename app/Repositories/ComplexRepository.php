<?php
namespace App\Repositories;

use App\Models\Complex;

class ComplexRepository extends BaseRepository {

    public function __construct(Complex $complex) {

        $this->model = $complex;

    }

    /**
     * Возвращает строительный комплекс по URL
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug) {

        $complex = $this->model->whereSlug($slug)->firstOrFail();

        return $complex;

    }

    /**
     * Возвращает все комплексы
     * @return mixed
     */
    public function getAllComplexes() {

        $complex = $this->model
            ->select('id', 'title', 'slug', 'image')
            ->where('status', '=', 0)
            ->get();

        return $complex;

    }

}