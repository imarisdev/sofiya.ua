<?php

namespace App\Models;


class Comments extends BaseModel {

    protected $table = 'comments';

    protected $statuses = [
        0 => "На проверке",
        1 => "Одобрен"
    ];

    public function commentable() {
        return $this->morphTo();
    }

    public function toArray() {
        $array = parent::toArray();
        return $array;
    }

    public function getStatuses() {
        return $this->statuses;
    }
}