<?php
namespace App\Http\Controllers;

use App\Repositories\ComplexRepository;
use App\Repositories\HouseRepository;
use App\Repositories\PlansRepository;
use App\Repositories\PlansTypeRepository;
use App\Repositories\SeoRepository;

class PlansTypeController extends Controller {

    protected $types;
    protected $plans;
    protected $complex;
    protected $house;
    protected $seo;

    public function __construct(PlansTypeRepository $types, PlansRepository $plans, ComplexRepository $complex, HouseRepository $house, SeoRepository $seo) {
        $this->types = $types;
        $this->plans = $plans;
        $this->house = $house;
        $this->complex = $complex;
        $this->seo = $seo;

    }

    /**
     * Страница типа планировок
     * @param $type
     * @return mixed
     */
    public function index($complex, $type) {

        $type = $this->types->getPlansTypeBySlug($type);

        $complex = $this->complex->getBySlug($complex);

        $this->complex->shareComplex($complex);

        $houses = $this->house->getByComplexId($complex->id);

        $plans = [];

        foreach($houses as $key => $house) {
            foreach($house->plansCache()->where('plans_type', $type['key'])->get() as $plan) {
                $plans[$key] = $plan;
            }
        }

        $breadcrumbs = [
            [
                'title' => "{$complex->title}",
                'link' => "/{$complex->link()}"
            ],
            [
                'title' => "{$type['title']}",
            ]
        ];

        return view('planstype.index', compact('houses', 'type', 'complex', 'plans', 'breadcrumbs'));

    }

    /**
     * Квартиры под ключ
     * @param $complex
     * @param $type
     * @return mixed
     */
    public function key($complex) {

        $complex = $this->complex->getBySlug($complex);

        $this->complex->shareComplex($complex);

        $houses = $this->house->getHouses(['decoration' => 1, 'complex_id' => $complex->id]);

        $breadcrumbs = [
            [
                'title' => "{$complex->title}",
                'link' => "/{$complex->link()}"
            ],
            [
                'title' => "Квартиры под ключ",
            ]
        ];

        return view('planstype.key', compact('houses', 'complex', 'breadcrumbs'));
    }

    /**
     * Аренда
     * @param $complex
     * @return mixed
     */
    public function rent($complex) {

        $complex = $this->complex->getBySlug($complex);

        $this->complex->shareComplex($complex);

        $type = $this->types->getPlansTypeBySlug('arenda');

        $houses = $this->house->getHouses(['is_rent' => 1, 'complex_id' => $complex->id]);

        $house_ids = array_column($houses->toArray()['data'], 'id');

        $plans = $this->plans->getPlansForRent(['house_id' => $house_ids, 'plans_type' => 5], 16);

        $breadcrumbs = [
            [
                'title' => "Планировки квартир",
                'link' => "/planirovki"
            ],
            [
                'title' => "{$type['title']} в {$complex->title}"
            ]
        ];

        $seo_params = [];

        $this->seo->getSeoData($type['key'], 'planstype', $seo_params);

        return view('plans.typeplans', compact('type', 'plans', 'breadcrumbs'));
    }

    /**
     * Квартиры с ремонтом
     * @param $complex
     * @return mixed
     */
    public function decoration($complex) {

        $complex = $this->complex->getBySlug($complex);

        $this->complex->shareComplex($complex);

        $type = $this->types->getPlansTypeBySlug('kvartiry-s-remontom');

        $houses = $this->house->getHouses(['complex_id' => $complex->id]);

        $house_ids = array_column($houses->toArray()['data'], 'id');

        $plans = $this->plans->getPlans(['house_id' => $house_ids, 'is_decoration' => 1], 16);

        $breadcrumbs = [
            [
                'title' => "{$complex->title}",
                'link' => "/{$complex->link()}"
            ],
            [
                'title' => "{$type['title']}",
            ]
        ];

        return view('plans.typeplans', compact('houses', 'type', 'complex', 'plans', 'breadcrumbs'));
    }

}