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

        $price_range = $this->plans->getPriceRange();

        return view('plans.allplans', compact('types', 'breadcrumbs', 'complex', 'price_range'));

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

        $price_range = $this->plans->getPriceRange();

        return view('plans.typeplans', compact('type', 'plans', 'breadcrumbs', 'price_range'));

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
    public function decoration($rooms_count = null) {
        $type = $this->types->getPlansTypeBySlug('kvartiry-s-remontom');

        if (isset($type) && isset($this->plans->getRoomsCount()[$rooms_count])) {
            $rooms_count = $this->plans->getRoomsCount()[$rooms_count];

            $plans = $this->plans->getPagedList(['is_decoration' => 1, 'rooms' => $rooms_count], 16);
        } else {
            $plans = $this->plans->getPagedList(['is_decoration' => 1], 16);
        }


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

        $flat_count_navigation = true;

        return view('plans.typeplans', compact('type', 'plans', 'breadcrumbs', 'flat_count_navigation'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function studio() {
        $type = $this->types->getPlansTypeBySlug('kvartiry-studii');

        $plans = $this->plans->getPagedList(['is_studio' => 1], 16);

        $breadcrumbs = [
            [
                'title' => "Планировки квартир",
                'link' => "/planirovki"
            ],
            [
                'title' => "{$type['title']}"
            ]
        ];

        $this->seo->getSeoData($type['key'], 'planstype', []);

        return view('plans.typeplans', compact('type', 'plans', 'breadcrumbs'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function smart() {
        $type = $this->types->getPlansTypeBySlug('smart-kvartiry');

        $plans = $this->plans->getPagedList(['is_smart' => 1], 16);

        $breadcrumbs = [
            [
                'title' => "Планировки квартир",
                'link' => "/planirovki"
            ],
            [
                'title' => "{$type['title']}"
            ]
        ];

        $this->seo->getSeoData($type['key'], 'planstype', []);

        return view('plans.typeplans', compact('type', 'plans', 'breadcrumbs'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function elit() {
        $type = $this->types->getPlansTypeBySlug('elitnye-kvartiry');

        $plans = $this->plans->getPagedList(['is_elit' => 1], 16);

        $breadcrumbs = [
            [
                'title' => "Планировки квартир",
                'link' => "/planirovki"
            ],
            [
                'title' => "{$type['title']}"
            ]
        ];

        $this->seo->getSeoData($type['key'], 'planstype', []);

        return view('plans.typeplans', compact('type', 'plans', 'breadcrumbs'));
    }

    /**
     * @param $years
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function installment($years) {
        $plans = $this->plans->getPagedList(['installment_plan' => $years], 16);

        $installment_plan = $this->plans->getInstallmentPlans()[$years];

        if (empty($installment_plan)) {
            abort(404);
        }

        $type = [
            'title' => sprintf('Квартиры в рассрочку на %s', $installment_plan)
        ];

        $breadcrumbs = [
            [
                'title' => "Рассрочка",
                'link' => "/rassrochka"
            ],
            [
                'title' => $type['title']
            ]
        ];

        $this->seo->getSeoData();

        return view('plans.installment_plans', compact('type', 'plans', 'breadcrumbs'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function credit() {
        $plans = $this->plans->getPagedList(['is_credit' => 1], 16);

        $type = [
            'title' => 'Квартира в кредит от застройщика'
        ];

        $breadcrumbs = [
            [
                'title' => "Планировки квартир",
                'link' => "/planirovki"
            ],
            [
                'title' => "{$type['title']}"
            ]
        ];

        $this->seo->getSeoData();

        return view('plans.typeplans', compact('type', 'plans', 'breadcrumbs'));
    }

    /**
     * @param $price
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function byPrice($price) {
        $prices = $this->plans->getPriceRange();

        if (!isset($prices[$price])) {
            abort(404);
        }

        $plans = $this->plans->getPagedList(['price_range' => $price], 16);

        $type = [
            'title' => sprintf('Квартиры за %s USD', $price)
        ];

        $breadcrumbs = [
            [
                'title' => "Планировки квартир",
                'link' => "/planirovki"
            ],
            [
                'title' => "{$type['title']}"
            ]
        ];

        $this->seo->getSeoData();

        $price_range = $this->plans->getPriceRange();

        return view('plans.typeplans', compact('type', 'plans', 'breadcrumbs', 'price_range'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function houseFinished() {
        $houses = $this->house->getList(['is_finished' => 1]);

        $house_ids = $houses->pluck('id')->toArray();

        $plans = $this->plans->getPagedList(['house_id' => $house_ids], 16);

        $type = [
            'title' => 'Квартиры в сданом доме'
        ];

        $breadcrumbs = [
            [
                'title' => "Планировки квартир",
                'link' => "/planirovki"
            ],
            [
                'title' => "{$type['title']}"
            ]
        ];

        $this->seo->getSeoData();

        $price_range = $this->plans->getPriceRange();

        return view('plans.typeplans', compact('type', 'plans', 'breadcrumbs', 'price_range'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function houseBuilding() {
        $houses = $this->house->getList(['is_finished' => 0]);

        $house_ids = $houses->pluck('id')->toArray();

        $plans = $this->plans->getPagedList(['house_id' => $house_ids], 16);

        $type = [
            'title' => 'Квартиры в строящемся доме'
        ];

        $breadcrumbs = [
            [
                'title' => "Планировки квартир",
                'link' => "/planirovki"
            ],
            [
                'title' => "{$type['title']}"
            ]
        ];

        $this->seo->getSeoData();

        $price_range = $this->plans->getPriceRange();

        return view('plans.typeplans', compact('type', 'plans', 'breadcrumbs', 'price_range'));
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

        $this->checkURL($plan->pathLink());

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

        $this->complex->shareComplex($plan->house->complex);

        return view('plans.index', compact('plan', 'type', 'breadcrumbs', 'photos', 'balcony_types', 'bathroom_types'));
    }

}