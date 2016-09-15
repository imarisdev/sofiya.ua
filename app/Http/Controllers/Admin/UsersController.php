<?php
namespace App\Http\Controllers\Admin;

use App\Contracts\AdminItemContract;
use App\Repositories\AccessItemsRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UsersController extends AdminController implements AdminItemContract {

    protected $user;
    protected $role;
    protected $access_items;

    public function __construct(UserRepository $user, RoleRepository $role, AccessItemsRepository $access_items) {

        $this->user = $user;
        $this->role = $role;
        $this->access_items = $access_items;
    }

    /**
     * Список всех пользователей
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request) {

        $users = $this->user->getUsers($request->all(), 20);

        $roles = $this->role->getRoles();

        return view('admin.users.index', compact('users', 'roles'));

    }

    /**
     * Новый пользователь
     * @param $id
     * @return mixed
     */
    public function create() {

        $roles = $this->role->getRolesForSelect();

        $accesses = $this->access_items->getItems();

        $leaders = $this->user->getUsersForSelect(['role_id' => [3]]);

        return view('admin.users.create', compact('roles', 'accesses', 'leaders'));
    }

    /**
     * Создание пользователя
     * @param Request $request
     */
    public function store(Request $request) {

        return $this->user->store($request->all());

    }

    /**
     * Редактирование пользователя
     * @param $id
     * @return mixed
     */
    public function edit($id) {

        $roles = $this->role->getRolesForSelect();

        $user = $this->user->getById($id);

        if(!empty($user->access) && count($user->access) > 0) {
            $access_ids = [];
            foreach ($user->access as $access) {
                 $access_ids[] = $access->id;
            }
            $user->access_ids = $access_ids;
        }

        $accesses = $this->access_items->getItems();

        $leaders = $this->user->getUsersForSelect(['role_id' => [3]]);

        return view('admin.users.edit', compact('user', 'accesses', 'roles', 'leaders'));
    }

    /**
     * Обновление данных пользователя
     * @param Request $request
     */
    public function update(Request $request) {

        $user = $this->user->getById($request->get('id'));

        return $this->user->update($user, $request->all());

    }

    /**
     * Удаление пользователя
     * @param Request $request
     */
    public function delete(Request $request) {

        $user = $this->user->getById($request->get('id'));

        return $this->user->destroy($user);

    }

}