<?php
namespace App\Http\Controllers;

use App\Repositories\ComplexRepository;
use App\Repositories\PlansTypeRepository;

class ComplexController extends Controller {

    protected $complex;
    protected $types;

    public function __construct(ComplexRepository $complex, PlansTypeRepository $types) {
        $this->complex = $complex;
        $this->types = $types;
    }

    /**
     * Страница строительного комплекса
     * @param $url
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($url) {

        $complex = $this->complex->cache('getBySlug', 'complex_' . $url, $url);

        $types = $this->types->getPlansTypes();

        return view('complex.index', compact('complex', 'types'));
    }

    /**
     * Фото-галерея комплекса
     * @param $complex
     * @return mixed
     */
    public function gallery($complex) {

        $complex = $this->complex->cache('getBySlug', 'complex_' . $complex, $complex);

        return view('complex.gallery', compact('complex'));

    }

    /**
     * Видеофайлы комплекса
     * @param $complex
     * @return mixed
     */
    public function video($complex) {

        $complex = $this->complex->cache('getBySlug', 'complex_' . $complex, $complex);

        return view('complex.video', compact('complex'));

    }

    /**
     * Школа и садик
     * @param $complex
     * @return mixed
     */
    public function kids($complex) {

        $complex = $this->complex->cache('getBySlug', 'complex_' . $complex, $complex);

        return view('complex.kids', compact('complex'));

    }
}