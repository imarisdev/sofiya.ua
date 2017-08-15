<?php
namespace App\Repositories;

use Response;
use App\Models\House;

class HouseRepository extends BaseRepository {

    protected $image;
    protected $medialib;

    private $house_class = [
        1 => 'Комфорт-класс',
        2 => 'Бизнес'
    ];

    private $house_decoration = [
        1 => 'Без ремонта',
        2 => 'C ремонтом'
    ];

    private $installments = [
        1 => 'Рассрочка',
        2 => 'Кредит',
        3 => 'Вся сумма'
    ];

    public function __construct(House $house, ImageRepository $image, MedialibRepository $medialib) {

        $this->model = $house;
        $this->image = $image;
        $this->medialib = $medialib;
    }

    /**
     * Дома комплекса
     * @param $complex_id
     * @return mixed
     */
    public function getByComplexId($complex_id) {

        $houses = $this->model
            ->where('complex_id', '=', $complex_id)
            ->get();

        return $houses;
    }

    /**
     * Список домов
     * @param null $request
     * @param int $limit
     * @return mixed
     */
    public function getHouses($request = null, $limit = 20) {

        $house = $this->model;

        if(!empty($request['decoration'])) {
            $house = $house->where('decoration', '=', $request['decoration']);
        }

        if(!empty($request['complex_id'])) {
            $house = $house->where('complex_id', '=', $request['complex_id']);
        }

        if(!empty($request['is_rent'])) {
            $house = $house->where('is_rent', '=', $request['is_rent']);
        }

        return $house->paginate($limit);
    }

    /**
     * Список домов для формы
     * @return array
     */
    // TODO: use lists();
    public function getHousesForSelect() {
        //$houses = $this->model->all(['id', 'title'])->pluck('title', 'id');
        $houses = $this->model->all();
        $houses_list = array();

        foreach($houses as $house) {
            $houses_list[$house->id] = $house->title;
        }

        return $houses_list;
    }

    /**
     * Класы домов
     * @return array
     */
    public function getHouseClass() {
        return $this->house_class;
    }

    /**
     * Отделка квартир
     * @return array
     */
    public function getHouseDecoration() {
        return $this->house_decoration;
    }

    /**
     * Виды оплаты по дому
     * @return array
     */
    public function getHouseInstallments() {
        return $this->installments;
    }

    /**
     * Сохранение
     * @param $house
     * @param $inputs
     * @return mixed
     */
    private function save($house, $inputs) {
        
        $house->title           = $inputs['title'];
        $house->status          = $inputs['status'];
        $house->street_id       = $inputs['street_id'];
        $house->complex_id      = $inputs['complex_id'];
        $house->is_rent         = $inputs['is_rent'];
        $house->number          = $inputs['number'];
        $house->is_installments = $inputs['is_installments'];
        $house->parking         = $inputs['parking'];
        $house->building_type   = $inputs['building_type'];
        $house->floors          = $inputs['floors'];
        $house->transport       = $inputs['transport'];
        $house->to_stop         = $inputs['to_stop'];
        $house->completion_at   = $inputs['completion_at'];
        $house->decoration      = $inputs['decoration'];
        $house->flats           = $inputs['flats'];
        $house->class           = $inputs['class'];
        $house->content         = $inputs['content'];

        if(empty($inputs['slug'])) {
            $house->slug = $this->createSlug($inputs['title']);;
        } else {
            $house->slug = $inputs['slug'];
        }

		if(!empty($inputs['image'])) {
            $house->image = @serialize($this->image->uploadImage($inputs['image'][0]));
        }
      
        try {

            $house->save();

            if(!empty($inputs['plans'])) {
                $house->images_list = $this->processImagesList($inputs['plans'], $house);
            }

            if(!empty($inputs['slider'])) {
                $this->medialib->saveFiles($inputs['slider'], $house->id, 'house');
            }

            return Response::json(['item' => $house], 201);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }
    }

    /**
     * @param $images
     * @param $house
     * @return array
     */
    private function processImagesList($images, $house) {

        $images_list = @unserialize($house->images_list);

        foreach($images as $key => $image) {
            $images_list[$key] = $this->image->uploadImage($image[0]);
        }

        $house->images_list = @serialize($images_list);

        $house->save();
    }

    /**
     * Обновление данных
     * @param $inputs
     */
    public function update($house, $inputs) {

        return $this->save($house, $inputs);

    }

    /**
     * Создание
     * @param $inputs
     */
    public function store($inputs) {

        return $this->save(new $this->model, $inputs);

    }

    /**
     * Удаление
     * @param $house
     */
    public function destroy($house) {

        try {

            $house->delete();

            return Response::json(['item' => true], 200);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }
}