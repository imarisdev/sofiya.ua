<?php
namespace App\Http\Controllers;


use App\Repositories\ComplexRepository;
use App\Repositories\SeoRepository;
use App\Repositories\VideoRepository;

class VideoController extends Controller {

    private $video;
    private $complex;
    private $seo;

    public function __construct(
        VideoRepository $video,
        ComplexRepository $complex,
        SeoRepository $seo
    ) {
        $this->video = $video;
        $this->complex = $complex;
        $this->seo = $seo;
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

        $this->seo->getSeoData();

        return view('video.index', compact('videos', 'complex_list'));
    }

}