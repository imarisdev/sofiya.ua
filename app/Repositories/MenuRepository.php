<?php
namespace App\Repositories;

use App\Models\Menu;

class MenuRepository extends BaseRepository {

    public function __construct(Menu $menu) {

        $this->model = $menu;

    }

    /**
     * Возвращает меню для конкретной позиции
     * @param $position
     * @return mixed
     */
    public function getMenu($position) {

        $menu = $this->model
            ->where('position', '=', $position)
            ->orderBy('sort')
            ->get();

        return $menu;

    }

}