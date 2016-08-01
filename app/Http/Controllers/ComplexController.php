<?php
namespace App\Http\Controllers;

use App\Repositories\ComplexRepository;

class ComplexController extends Controller {

    protected $complex;

    public function __construct(ComplexRepository $complex) {
        $this->complex = $complex;
    }

    /**
     * Страница строительного комплекса
     * @param $url
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($url) {

        $complex = $this->complex->cache('getBySlug', 'complex_' . $url, $url);

        return view('complex.index', compact('complex'));
    }

}