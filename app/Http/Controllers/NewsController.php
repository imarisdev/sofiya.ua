<?php
namespace App\Http\Controllers;


class NewsController extends Controller {

    public function __construct() {

    }

    /**
     * Главная страница
     * @return mixed
     */
    public function index() {

        return view('news.index');
    }

}