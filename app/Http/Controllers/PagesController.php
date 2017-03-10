<?php
namespace App\Http\Controllers;


use App\Filters\Filters;
use App\Repositories\ComplexRepository;
use App\Repositories\PagesRepository;
use App\Repositories\SeoRepository;

class PagesController extends Controller {

    protected $page;
    protected $seo;
    protected $filter;
    protected $complex;

    public function __construct(PagesRepository $page, SeoRepository $seo, Filters $filter, ComplexRepository $complex) {

        $this->page = $page;
        $this->seo = $seo;
        $this->filter = $filter;
        $this->complex = $complex;
    }

    /**
     * Страница материала
     * @param $page
     */
    public function page($page) {

        $page = $this->filter->filters($this->page->getBySlug($page), ['gallery', 'users'], ['content' => 'content']);

        $this->seo->getSeoData($page->id, 'pages');

        $complex = null;

        if (preg_match('/(jk-martinov|jk-sofiya-smart|jk-klubniy|jk-sofiya-rezidens)/', $page, $complex_link)) {
            $complex = $this->complex->cache('getBySlug', 'complex_' . $complex_link[1], $complex_link[1]);
            $this->complex->shareComplex($complex);
        }

        if($complex) {
            $breadcrumbs = [
                [
                    'link' => "/{$complex->link()}",
                    'title' => $complex->title
                ],
                [
                    'title' => "{$page->title}"
                ]
            ];
        } else {
            $breadcrumbs = [
                [
                    'title' => "{$page->title}"
                ]
            ];
        }

        return view('pages.page', compact('page', 'breadcrumbs'));
    }

}