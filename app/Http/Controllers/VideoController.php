<?php
namespace App\Http\Controllers;


use App\Repositories\VideoRepository;

class VideoController extends Controller {

    protected $video;

    public function __construct(VideoRepository $video) {

        $this->video = $video;
    }

    /**
     * Страница видео
     * @return mixed
     */
    public function index() {

        $video = $this->video->getVideo(['object_type' => 1]);

        return view('video.index', compact('video'));
    }

}