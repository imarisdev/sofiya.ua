<?php
namespace App\Repositories;

use App\Models\Role;

class RoleRepository extends BaseRepository {

    public function __construct(Role $role) {

        $this->model = $role;

    }

    /**
     * Возвращает список ролей
     * @return mixed
     */
    public function getRoles() {
        $roles = $this->model->get();

        return $roles;
    }

    /**
     * Отдает список ролей юзеров
     */
    public function getRolesForSelect() {

        $roles = $this->model->all();

        $roles_list = array();

        foreach($roles as $role) {
            $roles_list[$role->id] = $role->title;
        }

        return $roles_list;
    }
}