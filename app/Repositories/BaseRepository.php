<?php
namespace App\Repositories;

use Cache;
use Config;

abstract class BaseRepository {

    /**
     * Экземпляр модели
     * @var
     */
    protected $model;

    /**
     * Кэшируемый метод
     * @param $method
     * @param $key
     * @param null $params
     * @return mixed
     */
    public function cache($method, $key, $params = null) {

        $data = Cache::remember($key, Config::get('cache.time.short'), function () use ($method, $params) {
            return $this->{$method}($params);
        });

        return $data;

    }

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