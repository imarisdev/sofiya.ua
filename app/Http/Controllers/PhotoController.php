<?php
namespace App\Http\Controllers;


use App\Repositories\ComplexRepository;
use App\Repositories\MedialibRepository;

class PhotoController extends Controller {

    protected $medialib;
    protected $complex;

    public function __construct(MedialibRepository $medialib, ComplexRepository $complex) {

        $this->medialib = $medialib;
        $this->complex = $complex;
    }

    /**
     * Страница видео
     * @return mixed
     */
    public function index() {

        $photos = $this->medialib->getPhotosByComplex(['object_type' => 'complex']);

        foreach($photos as $key => $video) {
            $photos[$key]['complex'] = $this->complex->getById($key);
        }

        $complex_list = $this->complex->getAllComplexes(['status' => 1]);

        return view('photo.index', compact('photos', 'complex_list'));
    }

}