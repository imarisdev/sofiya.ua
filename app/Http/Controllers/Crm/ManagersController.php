<?php
namespace App\Http\Controllers\Crm;

use App\Contracts\AdminItemContract;
use App\Repositories\AccessItemsRepository;
use App\Repositories\HouseRepository;
use App\Repositories\ManagerRepository;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

class ManagersController extends CrmController implements AdminItemContract {

    protected $manager;
    protected $role;
    protected $house;
    protected $access_items;

    public function __construct(ManagerRepository $manager, RoleRepository $role, AccessItemsRepository $access_items, HouseRepository $house) {

        $this->manager = $manager;
        $this->role = $role;
        $this->house = $house;
        $this->access_items = $access_items;
    }

    /**
     * Список всех менеджеров
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request) {

        $managers = $this->manager->getmanagers(['role_id' => [2, 3]], 20);

        $roles = $this->role->getRoles();

        return view('crm.managers.index', compact('managers', 'roles'));

    }

    /**
     * Новый пользователь
     * @param $id
     * @return mixed
     */
    public function create() {

        $roles = $this->role->getRolesForSelect();

        $accesses = $this->access_items->getItems();

        return view('admin.managers.create', compact('roles', 'accesses'));
    }

    /**
     * Создание пользователя
     * @param Request $request
     */
    public function store(Request $request) {

        return $this->manager->store($request->all());

    }

    /**
     * Редактирование менеджера
     * @param $id
     * @return mixed
     */
    public function edit($id) {

        $manager = $this->manager->getById($id);

        $leaders = $this->manager->getManagersForSelect(['role_id' => [3]]);

        $houses = $this->house->getHousesForSelect();

        return view('crm.managers.edit', compact('manager', 'leaders', 'houses'));
    }

    /**
     * Обновление данных пользователя
     * @param Request $request
     */
    public function update(Request $request) {

        $manager = $this->manager->getById($request->get('id'));

        return $this->manager->update($manager, $request->all());

    }

    /**
     * Удаление
     * @param Request $request
     */
    public function delete(Request $request) {

        return false;

    }

}