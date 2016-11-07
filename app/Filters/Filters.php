<?php

namespace App\Filters;

use View;
use App\Repositories\GalleryRepository;
use App\Repositories\MedialibRepository;

class Filters {

    protected $gallery;
    protected $medialib;

    public function __construct(GalleryRepository $gallery, MedialibRepository $medialib) {
        $this->gallery = $gallery;
        $this->medialib = $medialib;
    }

    /**
     * Функция вызова нескольких фильтров
     * @param $object
     * @param array $filters
     * @param array $params
     */
    public function filters($object, $filters = array(), $params = array()) {

        foreach($filters as $filter) {
            if(method_exists($this, $filter)) {
                $object = $this->$filter($object, $params);
            }
        }

        return $object;

    }

    /**
     * Галерея
     * @param $object
     * @param array $param
     * @return mixed
     */
    private function gallery($object, $param = ['content' => 'content']) {
        $object->{$param['content']} = preg_replace_callback('/\[gallery id=(\d+)\]/',
            function($matches) {
                $gallery = $this->gallery->getById($matches[1]);

                if(!empty($gallery->id)) {
                    $photos = $this->medialib->getFiles(['object_id' => $gallery->id, 'object_type' => 'gallery']);

                    $view = View::make('includes.gallery', ['photos' => $photos, 'gallery' => $gallery]);

                    return $view->render();
                } else {
                    return '';
                }
            }, $object->{$param['content']}
        );

        return $object;
    }

}