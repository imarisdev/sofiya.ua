<?php

namespace App\Http\Controllers;


use App\Repositories\ComplexRepository;
use App\Repositories\HouseRepository;
use App\Repositories\PlansRepository;
use App\Repositories\SeoRepository;
use App\Repositories\StreetRepository;

class SitemapController extends Controller {

    protected $seo;
    protected $houses;
    protected $streets;
    protected $complex;
    protected $plans;

    public function __construct(HouseRepository $houses, SeoRepository $seo, StreetRepository $streets, ComplexRepository $complex, PlansRepository $plans) {
        $this->houses = $houses;
        $this->seo = $seo;
        $this->streets = $streets;
        $this->complex = $complex;
        $this->plans = $plans;
    }

    /**
     * HTML карта сайта
     * @return mixed
     */
    public function html() {

        $this->seo->getSeoData();

        $houses = $this->houses->getHouses(null, 100);

        $streets = $this->streets->getStreets(null, 100);

        $complexes = $this->complex->getAllComplexes();

        $plans = $this->plans->getPlans(null, 500);

        return view('sitemap.html', compact('houses', 'streets', 'complexes', 'plans'));
    }
}