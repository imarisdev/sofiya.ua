<?php
namespace App\Repositories;

use View;
use Response;
use App\Models\Complex;

class ComplexRepository extends BaseRepository {

    protected $medialib;
    protected $image;
    protected $seo;

    public function __construct(Complex $complex, ImageRepository $image, SeoRepository $seo, MedialibRepository $medialib) {

        $this->model = $complex;
        $this->image = $image;
        $this->medialib = $medialib;
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
    public function getAllComplexes($request = null) {

        $complex = $this->model
            ->select('*');

        if(!empty($request['status'])) {
            $complex->where('status', '=', $request['status']);
        }

        return $complex->get();

    }

    /**
     * Список комплексов для формы
     * @return array
     */
    public function getComplexesForSelect($request = null) {
        $complexes = $this->model->select('*');

        if(!empty($request['status'])) {
            $complexes->where('status', '=', $request['status']);
        }

        $complexes_list = array();

        foreach($complexes->get() as $complex) {
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

        $complex->title     = $inputs['title'];
        $complex->owner     = $inputs['owner'];
        $complex->map       = $inputs['map'];
	$complex->content   = $inputs['content'];
        $complex->status    = 1;

        if(empty($inputs['slug'])) {
            $complex->slug = $this->createSlug($inputs['title']);;
        } else {
            $complex->slug = $inputs['slug'];
        }

        if(!empty($inputs['image_big'])) {
            $complex->image_big = @serialize($this->image->uploadImage($inputs['image_big'][0]));
        }

        if(!empty($inputs['image_small'])) {
            $complex->image_small = @serialize($this->image->uploadImage($inputs['image_small'][0]));
        }

        if(!empty($inputs['background'])) {
            $complex->background = @serialize($this->image->uploadImage($inputs['background'][0]));
        }

        try {

            $complex->save();

            if(isset($inputs['seo'])) {
                $this->seo->process($inputs['seo']);
            }

            if(!empty($inputs['slider'])) {
                foreach($inputs['slider'] as $image) {
                    $this->medialib->saveFiles($image, $complex->id, 'complex');
                }
            }

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

    /**
     * Создаем переменную комплекса для шаблона
     * @param $complex
     */
    public function shareComplex($complex) {
        View::share(['complex' => $complex]);
    }

}
