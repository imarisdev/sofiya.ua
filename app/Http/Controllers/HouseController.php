<?php
namespace App\Http\Controllers;

use App\Repositories\BuildingTypesRepository;
use App\Repositories\ComplexRepository;
use App\Repositories\HouseRepository;
use App\Repositories\MedialibRepository;
use App\Repositories\PlansRepository;
use App\Repositories\PlansTypeRepository;
use App\Repositories\SeoRepository;

class HouseController extends Controller {

    protected $complex;
    protected $house;
    protected $types;
    protected $plans;
    protected $building_types;
    protected $seo;
    protected $medialib;

    public function __construct(
        ComplexRepository $complex,
        HouseRepository $house,
        PlansTypeRepository $types,
        PlansRepository $plans,
        BuildingTypesRepository $building_types,
        SeoRepository $seo,
        MedialibRepository $medialib
    ) {
        $this->complex = $complex;
        $this->house = $house;
        $this->types = $types;
        $this->plans = $plans;
        $this->building_types = $building_types;
        $this->seo = $seo;
        $this->medialib = $medialib;
    }

    /**
     * Страница дома
     * @param $complex
     * @param $type
     * @param $id
     * @param $house
     * @return mixed
     */
    public function index($id, $house) {

        //$complex = $this->complex->cache('getBySlug', 'complex_' . $complex, $complex);

        $house = $this->house->getById($id);

        $house->images_list = @unserialize($house->images_list);

        $types = $this->types->getPlansTypes();

        $plans_list = [];

        foreach($house->plans as $plan) {
            $plans_list[$types[$plan->plans_type]['short']]['plans'][] = $plan;
            $plans_list[$types[$plan->plans_type]['short']]['info'] = $types[$plan->plans_type];
            $plans_list[$types[$plan->plans_type]['short']]['info']['id'] = $plan->plans_type;
        }

        //$type = $this->types->getPlansTypeBySlug($type);

        //$plans = $this->plans->getPlansByType($type['key'], $complex);

        $house_class = $this->house->getHouseClass();

        $building_types = $this->building_types->getTypesForSelect();

        $house_decoration = $this->house->getHouseDecoration();

        $installments = $this->house->getHouseInstallments();

        $bathroom_types = $this->plans->getBathroomTypes();

        $balcony_types = $this->plans->getBalconyTypes();

        $plans_types = $this->house->getModel()->getPlansTypes();

        $seo_params = [
            'id' => $house->id,
            'name' => $house->title,
            'address' => $house->street->title . ", " . $house->number
        ];

        $this->seo->getSeoData($house->id, 'houses', $seo_params);

        $breadcrumbs = [
            [
                'title' => "Софиевская Борщаговка",
                'link' => "/sofievskaya-borshagovka"
            ],
            [
                'title' => "{$house->title}"
            ]
        ];

        $photos = $this->medialib->getFiles(['object_id' => $house->id, 'object_type' => 'house']);

        $this->complex->shareComplex($house->complex);

        return view('house.index',
            compact('house', 'plans', 'house_class', 'building_types', 'photos', 'house_decoration', 'installments', 'plans_list', 'bathroom_types', 'balcony_types', 'breadcrumbs', 'plans_types')
        );

    }

}