<?php
namespace App\Http\Controllers;


use App\Repositories\SeoRepository;

class ContactsController extends Controller{

    private $seo;

    public function __construct(SeoRepository $seo) {
        $this->seo = $seo;
    }

    /**
     * Страница контактов
     * @return mixed
     */
    public function index() {

        $breadcrumbs = [
            [
                'title' => "Наши контакты"
            ]
        ];

        $this->seo->getSeoData();

        return view('contacts.index', compact('breadcrumbs'));
    }

}