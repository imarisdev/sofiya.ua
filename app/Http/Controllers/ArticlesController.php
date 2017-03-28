<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticlesRepository;
use App\Repositories\SeoRepository;

class ArticlesController extends Controller {

    protected $articles;
    protected $seo;

    public function __construct(ArticlesRepository $articles, SeoRepository $seo) {

        $this->articles = $articles;
        $this->seo = $seo;
    }

    /**
     * Страница новостей
     * @return mixed
     */
    public function news() {

        $articles = $this->articles->getArticles(['type' => 1]);

        $breadcrumbs = [
            [
                'title' => "Новости"
            ]
        ];

        return view('articles.news', compact('articles', 'breadcrumbs'));
    }

    /**
     * Страница акций
     * @return mixed'
     */
    public function shares() {

        $articles = $this->articles->getArticles(['type' => 2]);

        $breadcrumbs = [
            [
                'title' => "Акции"
            ]
        ];

        return view('articles.news', compact('articles', 'breadcrumbs'));
    }

    /**
     * Страница материала
     * @param $id
     * @param $slug
     * @return mixed
     */
    public function page($type, $id, $slug) {

        $article = $this->articles->getById($id);

        $this->articles->increment($article->id);

        $this->seo->getSeoData($article->id, 'articles');

        $breadcrumbs = [
            [
                'title' => "{$article->types[$article->type]['title']}",
                'link' => "/{$article->types[$article->type]['slug']}"
            ],
            [
                'title' => "{$article->title}"
            ]
        ];

        return view('articles.page', compact('article', 'breadcrumbs'));
    }
}