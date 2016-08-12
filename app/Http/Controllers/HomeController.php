<?php

namespace App\Http\Controllers;

use Cache;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function __construct() {

    }

    /**
     * Главная страница
     * @return mixed
     */
    public function index() {

        return view('home.index');
    }
}
