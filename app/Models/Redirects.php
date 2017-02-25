<?php

namespace App\Models;

class Redirects extends BaseModel {

    protected $table = 'redirects';

    public function toArray() {
        $array = parent::toArray();
        return $array;
    }

}