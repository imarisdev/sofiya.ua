<?php
namespace App\Http\Controllers;


use App\Repositories\PagesRepository;

class PagesController extends Controller {

    protected $page;

    public function __construct(PagesRepository $page) {

        $this->page = $page;

    }

    /**
     * Страница материала
     * @param $page
     */
    public function page($page) {

        $page = $this->page->getBySlug($page);

        return view('pages.page', compact('page'));
    }

}