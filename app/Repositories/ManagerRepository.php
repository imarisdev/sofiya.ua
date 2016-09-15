<?php
namespace App\Repositories;

use Response;
use App\Models\User;

class ManagerRepository extends BaseRepository {

    protected $house;

    public function __construct(User $user, HouseRepository $house) {

        $this->model = $user;
        $this->house = $house;
    }

    /**
     * Список пользователей
     * @param null $request
     * @param int $limit
     * @return mixed
     */
    public function getManagers($request = null, $limit = 20) {

        $managers = $this->model;

        if(!empty($request['role_id'])) {
            $managers = $managers->whereIn('role_id', $request['role_id']);
        }

        $managers = $managers->orderBy('created_at', 'desc');

        return $managers->paginate($limit);
    }

    /**
     * Список пользователей для формы
     * @return array
     */
    public function getManagersForSelect($request = null) {
        $managers = $this->model->select('id', 'name');

        if(!empty($request['role_id'])) {
            $managers->whereIn('role_id', $request['role_id']);
        }

        $managers_list = array();

        foreach($managers->get() as $manager) {
            $managers_list[$manager->id] = $manager->name;
        }

        return $managers_list;
    }

    /**
     * Метод сохранения
     * @param $user
     * @param $inputs
     * @return mixed
     */
    private function save($manager, $inputs) {

        $manager->name = $inputs['name'];
        $manager->email = $inputs['email'];
        $manager->leader = $inputs['leader'];

        if(!empty($inputs['house_id'])) {
            $house = $this->house->getById($inputs['house_id']);
            $house->manager_id = $manager->id;
            $house->save();
        }

        try {

            $manager->save();


            return Response::json(['item' => $manager], 201);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }

    /**
     * Обновление данных пользователя
     * @param $inputs
     */
    public function update($manager, $inputs) {

        return $this->save($manager, $inputs);

    }

    /**
     * Создание нового дома
     * @param $inputs
     */
    public function store($inputs) {

        return $this->save(new $this->model, $inputs);

    }

}