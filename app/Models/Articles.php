<?php
namespace App\Models;


class Articles extends BaseModel {

    protected $table = 'articles';

    public $types = [
        1 => ['slug' => 'novosti', 'title' => 'Новости'],
        2 => ['slug' => 'akciy', 'title' => 'Акции']
    ];

    /**
     * Ссылка на статью
     * @return string
     */
    public function link() {

        return "/{$this->types[$this->type]['slug']}/{$this->id}-{$this->slug}";

    }

    /**
     * Скращенный текст
     * @return mixed
     */
    public function getShortText($length = 100) {
        return $this->truncate($this->content, $length);
    }
}