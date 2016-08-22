<?php
namespace App\Models;


class Pages extends BaseModel {

    protected $table = 'pages';

    /**
     * Ссылка на статью
     * @return string
     */
    public function link() {

        return "{$this->id}-{$this->slug}";

    }

}