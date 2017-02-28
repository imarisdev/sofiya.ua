<?php
namespace App\Repositories;

use Response;
use App\Models\Banners;

class BannersRepository extends BaseRepository {

    protected $image;
    protected $file;

    private $positions = [
        1 => 'Шапка сайта',
        2 => 'Правая колонка',
        3 => 'На главной'
    ];

    private $types = [
        1 => 'Изображение',
        2 => 'Flash-файл'
    ];

    public function __construct(Banners $banners, ImageRepository $image, FileRepository $file) {

        $this->model = $banners;
        $this->image = $image;
        $this->file = $file;
    }

    /**
     * Список банеров
     * @param null $request
     * @param int $limit
     * @return mixed
     */
    public function getBanners($request = null, $limit = 20) {

        $banners = $this->model;

        return $banners->paginate($limit);
    }

    /**
     * Типы банеров
     * @return array
     */
    public function getTypes() {
        return $this->types;
    }

    /**
     * Позиции банеров
     * @return array
     */
    public function getPositions() {
        return $this->positions;
    }

    /**
     * Метод сохранения
     * @param $user
     * @param $inputs
     * @return mixed
     */
    private function save($banner, $inputs) {

        $banner->title         = $inputs['title'];
        $banner->type          = $inputs['type'];
        $banner->link          = $inputs['link'];
        $banner->action        = $inputs['action'];
        $banner->sort          = $inputs['sort'];
        $banner->height        = $inputs['height'];
        $banner->width         = $inputs['width'];
        $banner->position      = $inputs['position'];

        if(!empty($inputs['file'])) {
            if($inputs['type'] == 1) {
                $banner->file = @serialize($this->image->uploadImage($inputs['file'][0]));
            } else if($inputs['type'] == 2) {
                $banner->file = $this->file->uploadFile($inputs['file'][0]);
            }
        }

        try {

            $banner->save();

            return Response::json(['item' => $banner], 201);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }

    /**
     * Обновление данных
     * @param $inputs
     */
    public function update($banner, $inputs) {

        return $this->save($banner, $inputs);

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
    public function destroy($banner) {

        try {

            $banner->delete();

            return Response::json(['item' => true], 200);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }

}