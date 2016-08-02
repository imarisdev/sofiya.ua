<?php
namespace App\Repositories;


class PlansTypeRepository extends BaseRepository {

    private $types = [
        1 => ['slug' => 'odnokomnatnye-kvartiry', 'title' => 'Однокомнатные квартиры'],
        2 => ['slug' => 'dvuhkomnatnye-kvartiry', 'title' => 'Двухкомнатные квартиры'],
        3 => ['slug' => 'trehkomnatnye-kvartiry', 'title' => 'Трехкомнатные квартиры'],
        4 => ['slug' => 'dvuhurovnevye-kvartiry', 'title' => 'Двухуровневые квартиры'],
        5 => ['slug' => 'nezhilye-pomeshcheniya', 'title' => 'Нежилые помещения'],
        6 => ['slug' => 'pod-klyuch', 'title' => 'Под ключ']
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

}