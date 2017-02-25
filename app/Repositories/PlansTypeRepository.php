<?php
namespace App\Repositories;


class PlansTypeRepository extends BaseRepository {

    private $types = [
        1 => ['slug' => 'odnokomnatnye-kvartiry', 'title' => 'Однокомнатные квартиры', 'short' => 'Однокомнатные'],
        2 => ['slug' => 'dvuhkomnatnye-kvartiry', 'title' => 'Двухкомнатные квартиры', 'short' => 'Двухкомнатные'],
        3 => ['slug' => 'trehkomnatnye-kvartiry', 'title' => 'Трехкомнатные квартиры', 'short' => 'Трехкомнатные'],
        7 => ['slug' => 'chetyrekhkomnatnyye-kvartiry', 'title' => 'Четырехкомнатные квартиры', 'short' => 'Четырехкомнатные'],
        4 => ['slug' => 'dvuhurovnevye-kvartiry', 'title' => 'Двухуровневые квартиры', 'short' => 'Двухуровневые'],
        5 => ['slug' => 'nezhilye-pomeshcheniya', 'title' => 'Нежилые помещения', 'short' => 'Нежилые'],
        //6 => ['slug' => 'pod-klyuch', 'title' => 'Под ключ'],
        7 => ['slug' => 'kvartiry-s-remontom', 'title' => 'Квартиры с ремонтом', 'short' => 'С ремонтом'],
        8 => ['slug' => 'arenda', 'title' => 'Аренда квартир', 'short' => 'Аренда'],
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
     * @return array
     */
    public function getPlansTypesForSelect() {

        $plans_type_list = array();

        foreach($this->types as $key => $type) {
            $plans_type_list[$key] = $type['title'];
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