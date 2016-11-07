<?php
namespace App\Repositories;

use Response;
use App\Models\Menu;

class MenuRepository extends BaseRepository {

    protected $menu_positions = [
        'top' => 'Верхнее меню',
        'head' => 'Меню в шапке'
    ];

    public function __construct(Menu $menu) {

        $this->model = $menu;
    }

    /**
     * Возвращает меню для конкретной позиции
     * @param $position
     * @return mixed
     */
    public function getMenu($position, $build = false) {

        $menu = $this->model
            ->where('position', '=', $position)
            ->orderBy('parent')
            ->orderBy('sort')
            ->get();

        if($build) {
            return $this->menuBuilder($menu->toArray());
        }

        return $menu;

    }

    /**
     * Собор меню в дерево
     * @param $menu
     * @param int $parent
     * @return array
     */
    public function menuBuilder($menu, $parent = 0) {

        $result = [];

        foreach ($menu as $row) {
            if ($row['parent'] == $parent) {
                $result[$row['id']] = $row;
                if ($this->hasChildren($menu, $row['id'])) {
                    $result[$row['id']]['child'] = $this->menuBuilder($menu, $row['id']);
                }
            }
        }
        return $result;
    }

    /**
     * Проверка на наличие вложеных меню
     * @param $rows
     * @param $id
     * @return bool
     */
    public function hasChildren($rows, $id) {
        foreach ($rows as $row) {
            if ($row['parent'] == $id) {
                return true;
            }
        }
        return false;
    }
    /**
     * Позиции меню
     * @return array
     */
    public function getMenuPositions() {
        return $this->menu_positions;
    }

    /**
     * Сохранение
     * @param $house
     * @param $inputs
     * @return mixed
     */
    private function save($menu, $inputs) {

        $menu->title          = $inputs['title'];
        $menu->slug           = $inputs['slug'];
        $menu->path           = null;
        $menu->parent         = $inputs['parent'];
        $menu->status         = $inputs['status'];
        $menu->sort           = $inputs['sort'];
        $menu->position       = $inputs['position'];
        $menu->external       = $inputs['external'];


        try {

            $menu->save();

            return Response::json(['item' => $menu], 201);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }
    }

    /**
     * Обновление данных
     * @param $inputs
     */
    public function update($menu, $inputs) {

        return $this->save($menu, $inputs);

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
     * @param $flat
     */
    public function destroy($menu) {

        try {

            $menu->delete();

            return Response::json(['item' => true], 200);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }

    /**
     * Обновление структуры меню
     * @param $inputs
     */
    public function rebuild($inputs) {

        $menu = null;

        foreach ($inputs['menu_item_parent'] as $id => $parent) {
            $item = $this->getById($id);

            $item->parent = !empty($parent) ? $parent : 0;
            $item->sort = $inputs['menu_item_sort'][$id];
            
            $menu = $this->save($item, $item->toArray());
        }

        return Response::json(['item' => true], 200);

    }

}