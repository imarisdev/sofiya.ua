<?php
namespace App\Http\Controllers;


use App\Repositories\PagesRepository;
use App\Repositories\SeoRepository;

class PagesController extends Controller {

    protected $page;
    protected $seo;

    public function __construct(PagesRepository $page, SeoRepository $seo) {

        $this->page = $page;
        $this->seo = $seo;
    }

    /**
     * Страница материала
     * @param $page
     */
    public function page($page) {

        $page = $this->page->getBySlug($page);

        $this->seo->getSeoData($page->id, 'page');

        return view('pages.page', compact('page'));
    }

}