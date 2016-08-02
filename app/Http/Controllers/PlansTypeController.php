<?php
namespace App\Http\Controllers;

use App\Repositories\PlansRepository;
use App\Repositories\PlansTypeRepository;

class PlansTypeController extends Controller {

    protected $types;
    protected $plans;

    public function __construct(PlansTypeRepository $types, PlansRepository $plans) {
        $this->types = $types;
        $this->plans = $plans;
    }

    /**
     * Страница типа планировок
     * @param $type
     * @return mixed
     */
    public function index($complex, $type) {

        $type = $this->types->getPlansTypeBySlug($type);

        $plans = $this->plans->getPlansByType($type['key']);

        return view('planstype.index', compact('plans', 'type', 'complex'));

    }

}