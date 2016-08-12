<?php
namespace App\Models;


class Role extends BaseModel {

    protected $table = 'roles';

    public $timestamps = false;

    public function users() {
        return $this->hasMany('App\Models\User');
    }
}