<?php
namespace App\Http\Controllers;

use App\Repositories\ComplexRepository;
use App\Repositories\HouseRepository;

class HouseController extends Controller {

    protected $complex;
    protected $house;

    public function __construct(ComplexRepository $complex, HouseRepository $house) {
        $this->complex = $complex;
        $this->house = $house;
    }

    /**
     * Страница дома
     * @param $complex
     * @param $type
     * @param $id
     * @param $house
     * @return mixed
     */
    public function index($complex, $type, $id, $house) {

        $complex = $this->complex->cache('getBySlug', 'complex_' . $complex, $complex);

        $house = $this->house->getById($id);

        return view('house.index', compact('complex', 'house'));

    }

}