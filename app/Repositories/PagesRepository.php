<?php
namespace App\Repositories;

use Response;
use App\Models\Pages;

class PagesRepository extends BaseRepository {

    protected $image;
    protected $seo;

    public function __construct(Pages $pages, ImageRepository $image, SeoRepository $seo) {

        $this->model = $pages;
        $this->image = $image;
        $this->seo = $seo;
    }

    /**
     * Список страниц
     * @param null $request
     * @param int $limit
     * @return mixed
     */
    public function getPages($request = null, $limit = 20) {

        $pages = $this->model;

        return $pages->paginate($limit);

    }

    /**
     * Метод сохранения
     * @param $user
     * @param $inputs
     * @return mixed
     */
    private function save($page, $inputs) {

        $page->title         = $inputs['title'];
        $page->content       = $inputs['content'];

        if(empty($inputs['slug'])) {
            $page->slug = $this->createSlug($inputs['title']);;
        } else {
            $page->slug = $inputs['slug'];
        }

        if(!empty($inputs['image'])) {
            $page->image = @serialize($this->image->uploadImage($inputs['image'][0]));
        }

        try {

            $page->save();

            if(isset($inputs['seo'])) {
                $this->seo->process($inputs['seo']);
            }

            return Response::json(['item' => $page], 201);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }

    /**
     * Обновление данных
     * @param $inputs
     */
    public function update($page, $inputs) {

        return $this->save($page, $inputs);

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
    public function destroy($page) {

        try {

            $page->delete();

            return Response::json(['item' => true], 200);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }
}