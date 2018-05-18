<?php
namespace App\Http\Controllers;


use App\Repositories\ComplexRepository;
use App\Repositories\MedialibRepository;
use App\Repositories\SeoRepository;

class PhotoController extends Controller {

    private $medialib;
    private $complex;
    private $seo;

    public function __construct(
        MedialibRepository $medialib,
        ComplexRepository $complex,
        SeoRepository $seo
    ) {
        $this->medialib = $medialib;
        $this->complex = $complex;
        $this->seo = $seo;
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

        $this->seo->getSeoData();

        return view('photo.index', compact('photos', 'complex_list'));
    }

}