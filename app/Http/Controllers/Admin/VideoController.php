<?php
namespace App\Http\Controllers\Admin;

use App\Models\Complex;
use App\Repositories\ComplexRepository;
use App\Repositories\HouseRepository;
use Illuminate\Http\Request;
use App\Contracts\AdminItemContract;
use App\Repositories\VideoRepository;

class VideoController extends AdminController implements AdminItemContract {

    protected $video;
    protected $complex;
    protected $house;

    public function __construct(VideoRepository $video, ComplexRepository $complex, HouseRepository $house) {

        $this->video = $video;
        $this->complex = $complex;
        $this->house = $house;
    }

    /**
     * Главная страница
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request) {

        $video = $this->video->getVideo($request->all());

        return view('admin.video.index', compact('video'));

    }

    /**
     * Новый объект
     * @param $id
     * @return mixed
     */
    public function create() {

        $types = $this->video->getTypes();

        $objects = $this->getObjects();

        return view('admin.video.create', compact('types', 'objects'));
    }

    /**
     * Создание
     * @param Request $request
     */
    public function store(Request $request) {

        return $this->video->store($request->all());

    }

    /**
     * Редактирование
     * @param $id
     * @return mixed
     */
    public function edit($id) {

        $video = $this->video->getById($id);

        $types = $this->video->getTypes();

        $objects = $this->getObjects();

        return view('admin.video.edit', compact('video', 'types', 'objects'));
    }

    /**
     * Обновление данных
     * @param Request $request
     */
    public function update(Request $request) {

        $video = $this->video->getById($request->get('id'));

        return $this->video->update($video, $request->all());

    }

    /**
     * Удаление
     * @param Request $request
     */
    public function delete(Request $request) {

        $video = $this->video->getById($request->get('id'));

        return $this->video->destroy($video);

    }

    /**
     * Объекты для видео
     */
    public function getObjects() {

        $objects = [];

        $objects['complex'] = $this->complex->getComplexesForSelect();
        //$objects['houses'] = $this->house->getHousesForSelect();

        return $objects;
    }
}