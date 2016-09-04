<?php
namespace App\Repositories;


use App\Models\AccessItems;

class AccessItemsRepository extends BaseRepository {

    public function __construct(AccessItems $access_items) {

        $this->model = $access_items;

    }

    /**
     * Запрос одного доступа
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug) {

        $access_item = $this->model->whereSlug($slug)->firstOrFail();

        return $access_item;

    }

    /**
     * Список всех доступов
     * @return mixed
     */
    public function getItems() {

        $access_item = $this->model->get();

        return $access_item;

    }

    /**
     * Поиск правила доступа по роуту
     * @param $request
     * @return mixed
     */
    public function searchRule($request) {

        $slug = explode('.', $request['as']);
        $slug = implode('.', [$slug[0], $slug[1]]);

        $rule = $this->model->whereSlug($slug)->firstOrFail();

        return $rule;

    }

}