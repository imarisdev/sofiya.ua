<?php

namespace App\Repositories;

use Response;
use Validator;
use App\Models\Options;

class OptionsRepository extends BaseRepository {

    public function __construct(Options $options) {
        $this->model = $options;
    }

    /**
     * Опция
     * @param $options_key
     * @return mixed
     */
    public function getByKey($options_key) {

        $option = $this->model
            ->where('options_key', '=', $options_key)
            ->first();

        return $option;
    }


    /**
     * Значение опции
     * @param $options_key
     * @return mixed
     */
    public function getValueByKey($options_key) {

        $option = $this->model
            ->where('options_key', '=', $options_key)
            ->first();

        return $option->options_value;
    }

    /**
     * Список опций
     * @return mixed
     */
    public function getAllOptions() {
        $options = $this->model
            ->select('id', 'title', 'options_key', 'options_value')
            ->get();

        return $options;
    }

    /**
     * Сохранение
     * @param $option
     * @param $inputs
     * @return mixed
     */
    private function save($option, $inputs) {

        $option->title          = $inputs['title'];
        $option->options_key    = $inputs['options_key'];
        $option->options_value  = $inputs['options_value'];

        try {

            $option->save();

            return Response::json(['item' => $option], 201);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }
    }

    /**
     * Обновление данных
     * @param $option
     * @param $inputs
     *
     * @return array
     */
    public function update($option, $inputs) {

        return $this->save($option, $inputs);

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
     * @param $option
     */
    public function destroy($option) {

        try {

            $option->delete();

            return Response::json(['item' => true], 200);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }
}