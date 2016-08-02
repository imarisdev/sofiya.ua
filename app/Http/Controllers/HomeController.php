<?php

namespace App\Http\Controllers;

use Cache;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function __construct() {

    }

    /**
     * Главная траница
     * @return mixed
     */
    public function index() {

        return view('home.index');
    }

    /**
     * Очистка кэша
     */
    //TODO: временно
    public function clear() {
        Cache::flush();
        header('Location: /');
    }
}
