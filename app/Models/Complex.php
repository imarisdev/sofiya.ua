<?php
namespace App\Models;


class Complex extends BaseModel {

    protected $table = 'complex';

    public function video() {
        return $this->hasMany('App\Models\Video', 'object_id', 'id');
    }

    public function getVideo() {
        return $this->video()->where('object_type', 1)->get();
    }
}