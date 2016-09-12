<?php
namespace App\Http\Controllers;

use App\Repositories\ComplexRepository;
use App\Repositories\PlansTypeRepository;
use App\Repositories\SeoRepository;

class ComplexController extends Controller {

    protected $complex;
    protected $types;
    protected $seo;

    public function __construct(ComplexRepository $complex, PlansTypeRepository $types, SeoRepository $seo) {

        $this->complex = $complex;
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

        $breadcrumbs = [
            [
                'title' => "{$complex->title}",
                'link' => "/{$complex->slug}"
            ],
            [
                'title' => "Фото {$complex->title}"
            ]
        ];

        return view('complex.gallery', compact('complex', 'breadcrumbs'));

    }

    /**
     * Видеофайлы комплекса
     * @param $complex
     * @return mixed
     */
    public function video($complex) {

        $complex = $this->complex->cache('getBySlug', 'complex_' . $complex, $complex);

        $breadcrumbs = [
            [
                'title' => "{$complex->title}",
                'link' => "/{$complex->slug}"
            ],
            [
                'title' => "Видео {$complex->title}"
            ]
        ];

        return view('complex.video', compact('complex', 'breadcrumbs'));

    }

    /**
     * Школа и садик
     * @param $complex
     * @return mixed
     */
    public function kids($complex) {

        $complex = $this->complex->cache('getBySlug', 'complex_' . $complex, $complex);

        $breadcrumbs = [
            [
                'title' => "{$complex->title}",
                'link' => "/{$complex->slug}"
            ],
            [
                'title' => "Школа и садик в {$complex->title}"
            ]
        ];

        return view('complex.kids', compact('complex', 'breadcrumbs'));

    }
}