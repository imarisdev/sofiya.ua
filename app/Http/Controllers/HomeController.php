<?php

namespace App\Http\Controllers;

use App\Repositories\ArticlesRepository;
use App\Repositories\SeoRepository;
use App\Repositories\VideoRepository;
use Cache;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller {

    protected $articles;
    protected $video;
    protected $seo;

    public function __construct(ArticlesRepository $articles, VideoRepository $video, SeoRepository $seo) {

        $this->articles = $articles;
        $this->video = $video;
        $this->seo = $seo;
    }

    /**
     * Главная страница
     * @return mixed
     */
    public function index() {

        $news = $this->articles->getArticles(['type' => 1]);

        $video = $this->video->getVideo();

        $this->seo->getSeoData();

        return view('home.index', compact('news', 'video'));
    }

    /**
     * Генплан комплекса
     * @return mixed
     */
    public function genplan() {

        return view('home.genplan');
    }
}
