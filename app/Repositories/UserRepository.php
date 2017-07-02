<?php
namespace App\Repositories;

use Hash;
use Response;
use App\Models\User;

class UserRepository extends BaseRepository {

    protected $image;

    public function __construct(User $user, ImageRepository $image) {

        $this->model = $user;
        $this->image = $image;
    }

    /**
     * Список пользователей
     * @param null $request
     * @param int $limit
     * @return mixed
     */
    public function getUsers($request = null, $limit = 20) {

        $users = $this->model;

        if(!empty($request['role_id'])) {
            $users = $users->whereIn('role_id', $request['role_id']);
        }

        $users = $users->orderBy('created_at', 'desc');

        return $users->paginate($limit);
    }

    /**
     * Список пользователей для формы
     * @return array
     */
    public function getUsersForSelect($request = null) {
        $users = $this->model->select('id', 'name');

        if(!empty($request['role_id'])) {
            $users->whereIn('role_id', $request['role_id']);
        }

        $users_list = array();

        foreach($users->get() as $user) {
            $users_list[$user->id] = $user->name;
        }

        return $users_list;
    }

    /**
     * @param array $role_id
     * @return array
     */
    public function getByRole($role_id = []) {
        $users = $this->model->select('id', 'name', 'email', 'phone', 'photo');

        if(!empty($role_id)) {
            $users->whereIn('role_id', $role_id);
        }

        $users->orderBy('name');

        return $users->get();
    }

    /**
     * Метод сохранения
     * @param $user
     * @param $inputs
     * @return mixed
     */
    private function save($user, $inputs) {

        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->phone = $inputs['phone'];
        $user->role_id = floatval($inputs['role_id']);

        if(!empty($inputs['password'])) {
            $this->updatePassword($user, $inputs['password']);
        }

        if(!empty($inputs['photo'])) {
            $user->photo = @serialize($this->image->uploadImage($inputs['photo'][0]));
        }

        try {

            $user->save();

            if(!empty($inputs['accesses'])) {
                $this->updateAccess($user, $inputs['accesses']);
            }

            return Response::json(['item' => $user], 201);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }

    /**
     * Обновление пароля юзера
     * @param Request $request
     * @param $id
     */
    private function updatePassword($user, $password) {

        $user->fill([
            'password' => Hash::make($password)
        ])->save();
    }

    /**
     * Обновление прав доступа пользователя
     * @param $user
     * @param $accesses
     */
    private function updateAccess($user, $accesses) {

        $user->access()->detach();

        $user->access()->attach($accesses);
    }

    /**
     * Обновление данных пользователя
     * @param $inputs
     */
    public function update($user, $inputs) {

        return $this->save($user, $inputs);

    }

    /**
     * Создание нового дома
     * @param $inputs
     */
    public function store($inputs) {

        return $this->save(new $this->model, $inputs);

    }

    /**
     * Удаляет дом
     * @param $house
     */
    public function destroy($user) {

        try {

            $user->delete();

            return Response::json(['item' => true], 200);
        } catch(\Exception $e) {
            return Response::json(['error' => true, 'msg' => array($e->getMessage())], 400);
        }

    }

}