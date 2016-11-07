<?php
namespace App\Http\Controllers;


use App\Filters\Filters;
use App\Repositories\PagesRepository;
use App\Repositories\SeoRepository;

class PagesController extends Controller {

    protected $page;
    protected $seo;
    protected $filter;

    public function __construct(PagesRepository $page, SeoRepository $seo, Filters $filter) {

        $this->page = $page;
        $this->seo = $seo;
        $this->filter = $filter;
    }

    /**
     * Страница материала
     * @param $page
     */
    public function page($page) {

        $page = $this->filter->filters($this->page->getBySlug($page), ['gallery'], ['content' => 'content']);

        $this->seo->getSeoData($page->id, 'page');

        $breadcrumbs = [
            [
                'title' => "{$page->title}"
            ]
        ];

        return view('pages.page', compact('page', 'breadcrumbs'));
    }

}