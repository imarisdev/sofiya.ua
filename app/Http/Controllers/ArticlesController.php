<?php
namespace App\Http\Controllers;


use App\Repositories\ArticlesRepository;

class ArticlesController extends Controller {

    protected $articles;

    public function __construct(ArticlesRepository $articles) {

        $this->articles = $articles;

    }

    /**
     * Страница новостей
     * @return mixed
     */
    public function news() {

        $articles = $this->articles->getArticles(['type' => 1]);

        return view('articles.news', compact('articles'));
    }

    /**
     * Страница акций
     * @return mixed'
     */
    public function shares() {
        $articles = $this->articles->getArticles(['type' => 2]);

        return view('articles.news', compact('articles'));
    }

    /**
     * Страница материала
     * @param $id
     * @param $slug
     * @return mixed
     */
    public function page($id, $slug) {

        $article = $this->articles->getById($id);

        $this->articles->increment($article->id);

        return view('articles.page', compact('article'));
    }
}