<?php
namespace App\Repositories;

use Response;
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

    /**
     * Метод сохранения
     * @param $user
     * @param $inputs
     * @return mixed
     */
    private function save($complex, $inputs) {

        $complex->title = $inputs['title'];

        if(empty($inputs['slug'])) {
            $complex->slug = $this->createSlug($inputs['title']);;
        }

        try {

            $complex->save();

            return Response::json(['item' => $complex], 201);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }

    /**
     * Обновление данных
     * @param $inputs
     */
    public function update($complex, $inputs) {

        return $this->save($complex, $inputs);

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
    public function destroy($complex) {

        try {

            $complex->delete();

            return Response::json(['item' => true], 200);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }

}