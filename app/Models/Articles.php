<?php
namespace App\Models;


class Articles extends BaseModel {

    protected $table = 'articles';

    /**
     * Ссылка на статью
     * @return string
     */
    public function link() {

        return "{$this->id}-{$this->slug}";

    }
}