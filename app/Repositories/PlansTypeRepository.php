<?php
namespace App\Repositories;


class PlansTypeRepository extends BaseRepository {

    private $types = [
        1 => ['slug' => 'odnokomnatnye-kvartiry', 'title' => 'Однокомнатные квартиры', 'short' => 'Однокомнатные'],
        2 => ['slug' => 'dvuhkomnatnye-kvartiry', 'title' => 'Двухкомнатные квартиры', 'short' => 'Двухкомнатные'],
        3 => ['slug' => 'trehkomnatnye-kvartiry', 'title' => 'Трехкомнатные квартиры', 'short' => 'Трехкомнатные'],
        7 => ['slug' => 'chetyrekhkomnatnyye-kvartiry', 'title' => 'Четырехкомнатные квартиры', 'short' => 'Четырехкомнатные'],
        8 => ['slug' => 'kvartiry-s-remontom', 'title' => 'Квартиры с ремонтом', 'short' => 'С ремонтом'],
        4 => ['slug' => 'dvuhurovnevye-kvartiry', 'title' => 'Двухуровневые квартиры', 'short' => 'Двухуровневые'],
        5 => ['slug' => 'nezhilye-pomeshcheniya', 'title' => 'Нежилые помещения', 'short' => 'Нежилые'],
        9 => ['slug' => 'arenda', 'title' => 'Аренда квартир', 'short' => 'Аренда'],
        10 => ['slug' => 'kvartiry-studii', 'title' => 'Квартиры студии', 'short' => 'Квартиры студии'],
        11 => ['slug' => 'smart-kvartiry', 'title' => 'Смарт квартиры', 'short' => 'Смарт квартиры'],
        12 => ['slug' => 'elitnye-kvartiry', 'title' => 'Элитные квартиры', 'short' => 'Элитные квартиры'],
        6 => ['slug' => 'pod-klyuch', 'title' => 'Под ключ'],
    ];


    public function __construct() {

    }

    /**
     * Возвращает все типы планировок
     * @return array
     */
    public function getPlansTypes() {
        return $this->types;
    }

    /**
     * Типы планировок для формы
     * @param $exclude
     * @return array
     */
    public function getPlansTypesForSelect($exclude = []) {

        $plans_type_list = array();

        foreach($this->types as $key => $type) {
            if(!in_array($key, $exclude)) {
                $plans_type_list[$key] = $type['title'];
            }
        }

        return $plans_type_list;
    }

    /**
     * Возвращает ключ типа по линку
     * @param $slug
     * @return mixed
     */
    public function getPlansTypeBySlug($slug) {

        foreach($this->types as $tkey => $type) {
            if($slug == $type['slug']) {
                return array_merge(['key' => $tkey], $type);
            }
        }

    }

    /**
     * Возвращает ключ типа по ID
     * @param $slug
     * @return mixed
     */
    public function getPlansTypeById($id) {

        foreach($this->types as $tkey => $type) {
            if($id == $tkey) {
                return array_merge(['key' => $tkey], $type);
            }
        }

    }

}