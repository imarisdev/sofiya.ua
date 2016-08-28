<?php
namespace App\Repositories;

use Response;
use App\Models\Complex;

class ComplexRepository extends BaseRepository {

    protected $image;
    protected $seo;

    public function __construct(Complex $complex, ImageRepository $image, SeoRepository $seo) {

        $this->model = $complex;
        $this->image = $image;
        $this->seo = $seo;
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
            ->where('status', '=', 0)
            ->get();

        return $complex;

    }

    /**
     * Список комплексов для формы
     * @return array
     */
    public function getComplexesForSelect() {
        $complexes = $this->model->all();

        $complexes_list = array();

        foreach($complexes as $complex) {
            $complexes_list[$complex->id] = $complex->title;
        }

        return $complexes_list;
    }

    /**
     * Метод сохранения
     * @param $user
     * @param $inputs
     * @return mixed
     */
    private function save($complex, $inputs) {

        $complex->title = $inputs['title'];
        $complex->owner = $inputs['owner'];

        if(empty($inputs['slug'])) {
            $complex->slug = $this->createSlug($inputs['title']);;
        }

        if(!empty($inputs['image_big'])) {
            $complex->image_big = $this->image->uploadImage($inputs['image_big'][0]);
        }

        if(!empty($inputs['image_small'])) {
            $complex->image_small = $this->image->uploadImage($inputs['image_small'][0]);
        }

        if(!empty($inputs['background'])) {
            $complex->background = $this->image->uploadImage($inputs['background'][0]);
        }

        try {

            $complex->save();

            $this->seo->process($inputs['seo']);

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