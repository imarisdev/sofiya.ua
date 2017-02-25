<?php
namespace App\Http\Controllers;


use App\Repositories\ComplexRepository;
use App\Repositories\VideoRepository;

class VideoController extends Controller {

    protected $video;
    protected $complex;

    public function __construct(VideoRepository $video, ComplexRepository $complex) {

        $this->video = $video;
        $this->complex = $complex;
    }

    /**
     * Страница видео
     * @return mixed
     */
    public function index() {

        $videos = $this->video->getVideoByComplex(['object_type' => 1]);

        foreach($videos as $key => $video) {
            $videos[$key]['complex'] = $this->complex->getById($key);
        }

        $complex_list = $this->complex->getAllComplexes(['status' => 1]);

        return view('video.index', compact('videos', 'complex_list'));
    }

}