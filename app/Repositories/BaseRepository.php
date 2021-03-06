<?php
namespace App\Repositories;

use Cache;
use Config;

abstract class BaseRepository {

    /**
     * Экземпляр модели
     * @var
     */
    protected $model;

    /**
     * Кэшируемый метод
     * @param $method
     * @param $key
     * @param null $params
     * @return mixed
     */
    public function cache($method, $key, $params = null, $time = null) {

        if(empty($time)) {
            $time = Config::get('cache.time.short');
        }

        $data = Cache::remember($key, $time, function () use ($method, $params) {
            return $this->{$method}($params);
        });

        return $data;

    }

    /**
     * @return mixed
     */
    public function getModel() {
        return $this->model;
    }

    /**
     * Удалить объект модели по ID
     * @param $id
     */
    public function destroy($id) {
        $this->getById($id)->delete();
    }


    /**
     * Получить объект модели по ID
     * @param $id
     * @return mixed
     */
    public function getById($id) {

        $item = $this->model->findOrFail($id);

        return $item;
    }

    /**
     * Поиск по URL
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug) {

        $item = $this->model->whereSlug($slug)->firstOrFail();

        return $item;

    }

    /**
     * Счетчик
     * @param $id
     */
    public function increment($id) {

        $item = $this->getById($id);

        $item->views = $item->views + 1;

        $item->save();
    }

    /**
     * Транслитерация
     * @param $title
     */
    public function createSlug($title) {
        $gost = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'yo',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'j',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'x',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'shh',
            'ь' => '',  'ы' => 'y',   'ъ' => '',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'YO',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'J',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'X',   'Ц' => 'C',
            'Ч' => 'CH',  'Ш' => 'SH',  'Щ' => 'SHH',
            'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
            'Э' => 'E',   'Ю' => 'YU',  'Я' => 'YA',
            '.' => '', ' ' => '-'

        );

        $iso9_table = array(
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Ѓ' => 'G`',
            'Ґ' => 'G`', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'YO', 'Є' => 'YE',
            'Ж' => 'ZH', 'З' => 'Z', 'Ѕ' => 'Z', 'И' => 'I', 'Й' => 'J',
            'Ј' => 'J', 'І' => 'I', 'Ї' => 'YI', 'К' => 'K', 'Ќ' => 'K`',
            'Л' => 'L', 'Љ' => 'L', 'М' => 'M', 'Н' => 'N', 'Њ' => 'N',
            'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T',
            'У' => 'U', 'Ў' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'TS',
            'Ч' => 'CH', 'Џ' => 'DH', 'Ш' => 'SH', 'Щ' => 'SHH', 'Ъ' => '',
            'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'YU', 'Я' => 'YA',
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'ѓ' => 'g',
            'ґ' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'є' => 'ye',
            'ж' => 'zh', 'з' => 'z', 'ѕ' => 'z', 'и' => 'i', 'й' => 'j',
            'ј' => 'j', 'і' => 'i', 'ї' => 'yi', 'к' => 'k', 'ќ' => 'k',
            'л' => 'l', 'љ' => 'l', 'м' => 'm', 'н' => 'n', 'њ' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
            'у' => 'u', 'ў' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'ts',
            'ч' => 'ch', 'џ' => 'dh', 'ш' => 'sh', 'щ' => 'shh', 'ъ' => '',
            'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', '.' => ''
        );

        $geo2lat = array(
            'ა' => 'a', 'ბ' => 'b', 'გ' => 'g', 'დ' => 'd', 'ე' => 'e', 'ვ' => 'v',
            'ზ' => 'z', 'თ' => 'th', 'ი' => 'i', 'კ' => 'k', 'ლ' => 'l', 'მ' => 'm',
            'ნ' => 'n', 'ო' => 'o', 'პ' => 'p','ჟ' => 'zh','რ' => 'r','ს' => 's',
            'ტ' => 't','უ' => 'u','ფ' => 'ph','ქ' => 'q','ღ' => 'gh','ყ' => 'qh',
            'შ' => 'sh','ჩ' => 'ch','ც' => 'ts','ძ' => 'dz','წ' => 'ts','ჭ' => 'tch',
            'ხ' => 'kh','ჯ' => 'j','ჰ' => 'h'
        );

        $iso9_table = array_merge($iso9_table, $geo2lat);

        $title = strtr($title, $gost);

        $title = preg_replace("/[^A-Za-z0-9'_\-\.]/", '-', $title);
        $title = preg_replace('/\-+/', '-', $title);
        $title = preg_replace('/^-+/', '', $title);
        $title = preg_replace('/-+$/', '', $title);
        $title = strtolower($title);

        return trim($title);
    }

    public function slugify($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    /**
     * Уникальный ID
     */
    public function getUuid() {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }

    /**
     * @param null $request
     * @param int $limit
     * @param array $fields
     * @param array $order
     */
    public function getList(
        $request = null,
        $limit = 0,
        $fields = ['*'],
        $order = ['id' => 'asc']
    ) {
        $list = $this->model
            ->select($fields)
            ->orderBy(key($order), current($order));

        $list = $this->makeCondition($list, $request);

        if ($limit) {
            $list->take($limit);
        }

        return $list->get();
    }

    /**
     * @param array $request
     * @param int $limit
     * @param array $fields
     * @param array $order
     * @return mixed
     */
    public function getPagedList(
        $request = [],
        $limit = 20,
        $fields = ['*'],
        $order = ['id' => 'asc']
    ) {
        $list = $this->model
            ->select($fields)
            ->orderBy(key($order), current($order));

        $list = $this->makeCondition($list, $request);

        return $list->paginate($limit);
    }

    /**
     * Make query condition
     * @param $query
     * @param null $request
     * @return mixed
     */
    public function makeCondition($query, $request = null)
    {
        if ($request) {
            $columns = $this->model->getTableColumns();

            foreach($request as $field => $value) {
                if(!isset($value)) {
                    continue;
                }

                if(array_search($field, $columns) !== false) {
                    if (is_array($value) && in_array(key($value), ['<', '>', '<=', '>=', '<>', '!='], true)) {
                        $query->where($field, key($value), current($value));
                    } else if (is_array($value)) {
                        $query->whereIn($field, $value);
                    } else {
                        $query->where($field, $value);
                    }
                }
            }
        }

        return $query;
    }
}