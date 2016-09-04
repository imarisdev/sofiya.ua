<?php

namespace App\Http\Controllers;

use App\Repositories\ArticlesRepository;
use App\Repositories\VideoRepository;
use Cache;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller {

    protected $articles;
    protected $video;

    public function __construct(ArticlesRepository $articles, VideoRepository $video) {

        $this->articles = $articles;
        $this->video = $video;
    }

    /**
     * Главная страница
     * @return mixed
     */
    public function index() {

        $news = $this->articles->getArticles(['type' => 1]);

        $video = $this->video->getVideo();

        return view('home.index', compact('news', 'video'));
    }
}
