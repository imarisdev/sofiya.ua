<?php
namespace App\Http\Controllers\Admin;

use App\Repositories\HouseRepository;
use App\Repositories\MedialibRepository;
use App\Repositories\PlansRepository;
use App\Repositories\PlansTypeRepository;
use Illuminate\Http\Request;
use App\Contracts\AdminItemContract;

class PlansController extends AdminController implements AdminItemContract {

    protected $plans;
    protected $plans_type;
    protected $house;
    protected $medialib;

    public function __construct(PlansRepository $plans, PlansTypeRepository $plans_type, HouseRepository $house, MedialibRepository $medialib) {
        $this->plans = $plans;
        $this->plans_type = $plans_type;
        $this->house = $house;
        $this->medialib = $medialib;
    }

    /**
     * Главная страница
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request) {

        $plans = $this->plans->getPlans($request->all());

        $plan_types = $this->plans_type->getPlansTypesForSelect();

        $houses = $this->house->getHousesForSelect();

        return view('admin.plans.index', compact('plans', 'plan_types', 'houses'));

    }

    /**
     * Новый объект
     * @param $id
     * @return mixed
     */
    public function create() {

        $plans_type = $this->plans_type->getPlansTypesForSelect();

        $houses = $this->house->getHousesForSelect();

        $bathroom_types = $this->plans->getBathroomTypes();

        $balcony_types = $this->plans->getBalconyTypes();

        $plans_decoration = $this->plans->getPlansDecoration();

        $price_range = $this->plans->getPriceRange();

        $installment_plans = $this->plans->getInstallmentPlans();

        return view(
            'admin.plans.create',
            compact('plans_type', 'houses', 'bathroom_types', 'balcony_types', 'plans_decoration', 'price_range', 'installment_plans')
        );
    }

    /**
     * Создание
     * @param Request $request
     */
    public function store(Request $request) {

        return $this->plans->store($request->all());

    }

    /**
     * Редактирование
     * @param $id
     * @return mixed
     */
    public function edit($id) {

        $plan = $this->plans->getById($id);

        $plans_type = $this->plans_type->getPlansTypesForSelect();

        $houses = $this->house->getHousesForSelect();

        $bathroom_types = $this->plans->getBathroomTypes();

        $balcony_types = $this->plans->getBalconyTypes();

        $photos = $this->medialib->getFiles(['object_id' => $plan->id, 'object_type' => 'plans']);

        $plans_decoration = $this->plans->getPlansDecoration();

        $price_range = $this->plans->getPriceRange();

        $installment_plans = $this->plans->getInstallmentPlans();

        return view(
            'admin.plans.edit',
            compact('plan', 'plans_type', 'houses', 'bathroom_types', 'balcony_types', 'photos', 'plans_decoration', 'price_range', 'installment_plans')
        );
    }

    /**
     * Обновление данных
     * @param Request $request
     */
    public function update(Request $request) {

        $plan = $this->plans->getById($request->get('id'));

        return $this->plans->update($plan, $request->all());

    }

    /**
     * Удаление
     * @param Request $request
     */
    public function delete(Request $request) {

        $plan = $this->plans->getById($request->get('id'));

        return $this->plans->destroy($plan);

    }

    public function load(Request $request) {

        $result = $this->plans->getPlans($request->all());

        return response()->json(['items' => $result]);
    }

}