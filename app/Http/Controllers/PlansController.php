<?php
namespace App\Http\Controllers;

use App\Repositories\PlansRepository;

class PlansController extends Controller {

    protected $plans;

    public function __construct(PlansRepository $plans) {
        $this->plans = $plans;
    }

    /**
     * Страница планировки
     * @param $url
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($url) {

        $plans = $this->complex->cache('getBySlug', 'complex_' . $url, $url);

        return view('plans.index', compact('plans'));
    }

}