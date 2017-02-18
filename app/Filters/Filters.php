<?php

namespace App\Filters;

use App\Repositories\UserRepository;
use View;
use App\Repositories\GalleryRepository;
use App\Repositories\MedialibRepository;

class Filters {

    protected $gallery;
    protected $medialib;
    protected $users;

    public function __construct(GalleryRepository $gallery, MedialibRepository $medialib, UserRepository $users) {
        $this->gallery = $gallery;
        $this->medialib = $medialib;
        $this->users = $users;
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

    private function users($object, $param = ['content' => 'content']) {
        $object->{$param['content']} = preg_replace_callback('/\[users role=(\d+)\]/',
            function($matches) {
                $users = $this->users->getByRole([$matches[1]]);

                if(!empty($users) && count($users) > 0) {
                    $view = View::make('includes.users', ['users' => $users]);

                    return $view->render();
                } else {
                    return '';
                }
            }, $object->{$param['content']}
        );

        return $object;
    }


}