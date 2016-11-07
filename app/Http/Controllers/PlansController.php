<?php
namespace App\Http\Controllers;

use App\Repositories\ComplexRepository;
use App\Repositories\HouseRepository;
use App\Repositories\MedialibRepository;
use App\Repositories\PlansRepository;
use App\Repositories\PlansTypeRepository;
use App\Repositories\SeoRepository;

class PlansController extends Controller {

    protected $complex;
    protected $house;
    protected $types;
    protected $plans;
    protected $seo;
    protected $medialib;

    public function __construct(ComplexRepository $complex, HouseRepository $house, PlansTypeRepository $types, PlansRepository $plans, SeoRepository $seo, MedialibRepository $medialib) {
        $this->complex = $complex;
        $this->house = $house;
        $this->types = $types;
        $this->plans = $plans;
        $this->seo = $seo;
        $this->medialib = $medialib;
    }

    /**
     * Страница всех планировок
     */
    public function allPlans() {

        $types = $this->types->getPlansTypes();

        $breadcrumbs = [
            [
                'title' => "Планировки квартир",
            ]
        ];

        return view('plans.allplans', compact('types', 'breadcrumbs'));

    }

    /**
     * Страница типа планировок
     * @param $type
     * @return mixed
     */
    public function typePlans($type) {

        $type = $this->types->getPlansTypeBySlug($type);

        $plans = $this->plans->getPlansByType($type['key'], null);

        $breadcrumbs = [
            [
                'title' => "Планировки квартир",
                'link' => "/planirovki"
            ],
            [
                'title' => "{$type['title']}"
            ]
        ];

        return view('plans.typeplans', compact('type', 'plans', 'breadcrumbs'));

    }

    /**
     * Страница планировки
     * @param $url
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function plan($type, $id, $plan) {

        //$complex = $this->complex->cache('getBySlug', 'complex_' . $complex, $complex);

        //$house = $this->house->getById($id);

        $type = $this->types->getPlansTypeBySlug($type);

        $plan = $this->plans->getById($id);

        $seo_params = [
            'name' => $plan->title,
            'address' => $plan->house->street->title . ", " . $plan->house->number
        ];

        $this->seo->getSeoData($plan->id, 'plans', $seo_params);

        $breadcrumbs = [
            [
                'title' => "Планировки квартир",
                'link' => "/planirovki"
            ],
            [
                'title' => "{$type['title']}",
                'link' => "/planirovki/{$type['slug']}"
            ],
            [
                'title' => "{$plan->title}"
            ]
        ];

        $photos = $this->medialib->getFiles(['object_id' => $plan->id, 'object_type' => 'plans']);

        return view('plans.index', compact('plan', 'type', 'breadcrumbs', 'photos'));
    }

}