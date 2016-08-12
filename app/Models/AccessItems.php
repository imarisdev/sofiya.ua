<?php
namespace App\Models;


class AccessItems extends BaseModel {

    protected $table = 'access_items';

    public $timestamps = false;

    public function users() {
        return $this->morphToMany('App\Models\User', 'accesses');
    }

}