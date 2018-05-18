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
     *
     * @param $complex
     */
    public function allPlans($complex = null) {

        $types = $this->types->getPlansTypes();

        if($complex) {
            $complex = $this->complex->getBySlug($complex);
        }

        $breadcrumbs = [
            [
                'title' => "Планировки квартир",
            ]
        ];

        $this->seo->getSeoData();

        return view('plans.allplans', compact('types', 'breadcrumbs', 'complex'));

    }

    /**
     * Страница типа планировок
     * @param $type
     * @return mixed
     */
    public function typePlans($type) {

        $type = $this->types->getPlansTypeBySlug($type);

        if (!$type) {
            abort(404);
        }

        $plans = $this->plans->getPlans(['plans_type' => $type['key']], 16);

        $breadcrumbs = [
            [
                'title' => "Планировки квартир",
                'link' => "/planirovki"
            ],
            [
                'title' => "{$type['title']}"
            ]
        ];

        $seo_params = [];

        $this->seo->getSeoData($type['key'], 'planstype', $seo_params);

        return view('plans.typeplans', compact('type', 'plans', 'breadcrumbs'));

    }

    /**
     * Аренда
     * @return mixed
     */
    public function rent() {

        $type = $this->types->getPlansTypeBySlug('arenda');

        $houses = $this->house->getHouses(['is_rent' => 1]);

        $house_ids = [];
        foreach($houses as $house) {
            $house_ids[] = $house->id;
        }

        $plans = $this->plans->getPlansForRent(['house_id' => $house_ids, 'plans_type' => 5], 16);

        $breadcrumbs = [
            [
                'title' => "Планировки квартир",
                'link' => "/planirovki"
            ],
            [
                'title' => "{$type['title']}"
            ]
        ];

        $seo_params = [];

        $this->seo->getSeoData($type['key'], 'planstype', $seo_params);

        return view('plans.typeplans', compact('type', 'plans', 'breadcrumbs'));
    }

    /**
     * Квартиры с ремонтом
     * @return mixed
     */
    public function decoration() {
        $type = $this->types->getPlansTypeBySlug('kvartiry-s-remontom');

        $plans = $this->plans->getPlans(['is_decoration' => 1], 16);

        $breadcrumbs = [
            [
                'title' => "Планировки квартир",
                'link' => "/planirovki"
            ],
            [
                'title' => "{$type['title']}"
            ]
        ];

        $seo_params = [];

        $this->seo->getSeoData($type['key'], 'planstype', $seo_params);

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

        if (!$type) {
            abort(404);
        }

        $plan = $this->plans->getById($id);

        $seo_params = [
            'id' => $plan->id,
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

        $balcony_types = $this->plans->getBalconyTypes();
        $bathroom_types = $this->plans->getBathroomTypes();

        return view('plans.index', compact('plan', 'type', 'breadcrumbs', 'photos', 'balcony_types', 'bathroom_types'));
    }

}