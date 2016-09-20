<?php
namespace App\Http\Controllers;


use App\Repositories\MedialibRepository;

class PhotoController extends Controller {

    protected $medialib;

    public function __construct(MedialibRepository $medialib) {

        $this->medialib = $medialib;
    }

    /**
     * Страница видео
     * @return mixed
     */
    public function index() {

        $photos = $this->medialib->getFiles(['object_type' => 'complex']);

        return view('photo.index', compact('photos'));
    }

}