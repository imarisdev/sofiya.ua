<?php
namespace App\Http\Controllers;

use App\Repositories\ComplexRepository;
use App\Repositories\MedialibRepository;
use App\Repositories\PlansTypeRepository;
use App\Repositories\SeoRepository;

class ComplexController extends Controller {

    protected $medialib;
    protected $complex;
    protected $types;
    protected $seo;

    public function __construct(ComplexRepository $complex, PlansTypeRepository $types, SeoRepository $seo, MedialibRepository $medialib) {

        $this->complex = $complex;
        $this->medialib = $medialib;
        $this->types = $types;
        $this->seo = $seo;
    }

    /**
     * Страница строительного комплекса
     * @param $url
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($url) {

        $complex = $this->complex->cache('getBySlug', 'complex_' . $url, $url);

        $types = $this->types->getPlansTypes();

        $this->seo->getSeoData($complex->id, 'complex');

        $this->complex->shareComplex($complex);

        $breadcrumbs = [
            [
                'title' => "{$complex->title}"
            ]
        ];

        return view('complex.index', compact('complex', 'types', 'breadcrumbs'));
    }

    /**
     * Фото-галерея комплекса
     * @param $complex
     * @return mixed
     */
    public function gallery($complex) {

        $complex = $this->complex->cache('getBySlug', 'complex_' . $complex, $complex);

        $this->complex->shareComplex($complex);

        $breadcrumbs = [
            [
                'title' => "{$complex->title}",
                'link' => "/{$complex->link()}"
            ],
            [
                'title' => "Фото {$complex->title}"
            ]
        ];

        $photos = $this->medialib->getFiles(['object_type' => 'complex', 'object_id' => $complex->id]);

        $complex_list = $this->complex->getAllComplexes(['status' => 1]);

        return view('complex.gallery', compact('complex', 'breadcrumbs', 'photos', 'complex_list'));

    }

    /**
     * Видеофайлы комплекса
     * @param $complex
     * @return mixed
     */
    public function video($complex) {

        $complex = $this->complex->cache('getBySlug', 'complex_' . $complex, $complex);

        $this->complex->shareComplex($complex);

        $complex_list = $this->complex->getAllComplexes(['status' => 1]);

        $breadcrumbs = [
            [
                'title' => "{$complex->title}",
                'link' => "/{$complex->link()}"
            ],
            [
                'title' => "Видео {$complex->title}"
            ]
        ];

        return view('complex.video', compact('complex', 'breadcrumbs', 'complex_list'));

    }

    /**
     * Школа и садик
     * @param $complex
     * @return mixed
     */
    public function kids($complex) {

        $complex = $this->complex->cache('getBySlug', 'complex_' . $complex, $complex);

        $this->complex->shareComplex($complex);

        $breadcrumbs = [
            [
                'title' => "{$complex->title}",
                'link' => "/{$complex->link()}"
            ],
            [
                'title' => "Школа и садик в {$complex->title}"
            ]
        ];

        return view('complex.kids', compact('complex', 'breadcrumbs'));

    }
}