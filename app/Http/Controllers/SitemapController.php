<?php

namespace App\Http\Controllers;


use App\Repositories\HouseRepository;
use App\Repositories\SeoRepository;
use App\Repositories\StreetRepository;

class SitemapController extends Controller {

    protected $seo;
    protected $houses;
    protected $streets;

    public function __construct(HouseRepository $houses, SeoRepository $seo, StreetRepository $streets) {
        $this->houses = $houses;
        $this->seo = $seo;
        $this->streets = $streets;
    }

    /**
     * HTML карта сайта
     * @return mixed
     */
    public function html() {

        $this->seo->getSeoData();

        $houses = $this->houses->getHouses(null, 100);

        $streets = $this->streets->getStreets(null, 100);

        return view('sitemap.html', compact('houses', 'streets'));
    }
}