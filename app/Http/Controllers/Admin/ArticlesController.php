<?php
namespace App\Http\Controllers\Admin;

use App\Repositories\ArticlesRepository;
use App\Repositories\SeoRepository;
use Illuminate\Http\Request;
use App\Contracts\AdminItemContract;

class ArticlesController extends AdminController implements AdminItemContract {

    protected $articles;
    protected $seo;

    public function __construct(ArticlesRepository $articles, SeoRepository $seo) {
        $this->seo = $seo;
        $this->articles = $articles;

    }

    /**
     * Главная страница
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request) {

        $articles = $this->articles->getArticles($request->all());

        $types = $this->articles->getArticleTypes();

        return view('admin.articles.index', compact('articles', 'types'));

    }

    /**
     * Новый объект
     * @param $id
     * @return mixed
     */
    public function create() {

        $types = $this->articles->getArticleTypes();

        $seo = [];

        return view('admin.articles.create', compact('types', 'seo'));
    }

    /**
     * Создание
     * @param Request $request
     */
    public function store(Request $request) {

        return $this->articles->store($request->all());

    }

    /**
     * Редактирование
     * @param $id
     * @return mixed
     */
    public function edit($id) {

        $article = $this->articles->getById($id);

        $types = $this->articles->getArticleTypes();

        $seo = $this->seo->getSeoItem($id, 'articles');

        return view('admin.articles.edit', compact('article', 'types', 'seo'));
    }

    /**
     * Обновление данных
     * @param Request $request
     */
    public function update(Request $request) {

        $article = $this->articles->getById($request->get('id'));

        return $this->articles->update($article, $request->all());

    }

    /**
     * Удаление
     * @param Request $request
     */
    public function delete(Request $request) {

        $article = $this->articles->getById($request->get('id'));

        return $this->articles->destroy($article);

    }

}