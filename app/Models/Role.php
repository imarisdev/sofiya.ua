<?php
namespace App\Models;


class Role extends BaseModel {

    protected $table = 'roles';

    public function users() {
        return $this->hasMany('App\Models\User');
    }
}