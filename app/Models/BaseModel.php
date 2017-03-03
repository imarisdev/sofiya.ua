<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class BaseModel extends Model {
    use Rememberable;

    public $extension = ".html";

    /**
     * Получить список колонок таблицы
     *
     * @return mixed
     */
    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    /**
     * Полная ссылка на страницу
     * @return string
     */
    public function getFullLink() {
        return url('/') . $this->getLink();
    }

    /**
     * Полная ссылка на категорию
     * @return string
     */
    public function getFullPath() {
        return url('/') . $this->getPath();
    }

    /**
     * Срез текста
     * @param $text
     * @param int $length
     * @return mixed
     */
    public function truncate($text, $length = 100) {
        $length = abs((int)$length);
        if(strlen($text) > $length) {
            $text = strip_tags($text);
            $text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
        }
        return($text);
    }
}