<?php

namespace App\Http\Controllers;

use App\Repositories\ArticlesRepository;
use Cache;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller {

    protected $articles;

    public function __construct(ArticlesRepository $articles) {

        $this->articles = $articles;
    }

    /**
     * Главная страница
     * @return mixed
     */
    public function index() {

        $news = $this->articles->getArticles(['type' => 1]);

        return view('home.index', compact('news'));
    }
}
