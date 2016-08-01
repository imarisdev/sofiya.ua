<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\ComplexRepository;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function __construct() {

    }


    public function index() {

        return view('home.index');
    }
}
