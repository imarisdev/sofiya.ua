<?php
namespace App\Repositories;


abstract class BaseRepository {

    /**
     * Экземпляр модели
     * @var
     */
    protected $model;

    /**
     * Удалить объект модели по ID
     * @param $id
     */
    public function destroy($id) {
        $this->getById($id)->delete();
    }


    /**
     * Получить объект модели по ID
     * @param $id
     * @return mixed
     */
    public function getById($id) {
        return $this->model->findOrFail($id);
    }

}