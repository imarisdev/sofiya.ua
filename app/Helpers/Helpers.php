<?php
namespace App\Helpers;

use DB;

class Helpers {


    /**
     * Возвращает ссылку на картинку с параметрами
     * @param null $file
     * @param null $size
     * @param null $empty
     * @param string $resize_type
     * @return null|string
     */
    public static function getImage($file = null, $size = null, $empty = null, $resize_type = 'resize') {
        if (empty($file)) {
            return $empty;
        } else {
            if (empty($size)) {
                $image = $file['file'] . $file['ext'];
            } else {
                $image = $file['file'] . '_' . $size . '_' . $resize_type . $file['ext'];
            }

            return $image;
        }
    }

    /**
     * Формирует РУС дату
     * @param $date
     * @param string $format
     * @return string
     */
    public static function getDate($date, $format = '%d %B, %Y') {

        if(!empty($date)) {
            setlocale(LC_TIME, 'ru_RU.UTF-8');

            return strftime($format, strtotime($date));
        } else {
            return '';
        }
    }

    /**
     * Возвращает элементы меню
     * @param $position
     * @return mixed
     */
    public static function getMenu($position, $order = 'order') {

       $menu = DB::table('menu')
           ->where('position', '=', $position)
           ->where('status', '=', 1)
           ->orderBy($order, 'asc')
           ->get();

        //dd( self::buildMenu((array) $menu));
        return self::buildMenu((array) $menu);

    }

    /**
     * Рекурсивно строит меню
     * @param $items
     * @return array
     */
    public static function buildMenu($items) {

        $menu = [];

        foreach ($items as $key => $item) {
            if($item->parent == 0) {
                if($item->external == 0) {
                    $menu[$item->id]['item'] = (array) $item;
                    $menu[$item->id]['item']['link']  = "/{$item->path}";
                } else {
                    $menu[$item->id]['item'] = (array) $item;
                    $menu[$item->id]['item']['link']  = $item->path;
                }
            } else {
                $menu[$item->parent]['child'][$item->id]['item'] = (array) $item;
                $menu[$item->parent]['child'][$item->id]['item']['link']  = "/{$item->path}";
            }
        }

        return $menu;
    }

    /**
     * Возвдращает список комплексов
     * @return mixed
     */
    public static function getComplex() {

        $complex = DB::table('complex')
            ->where('status', '=', 1)
            ->get();

        return $complex;

    }

    /**
     * Создает ссылку для лого комплексов
     * @param $complex
     * @param null $path
     */
    public static function createComplexLink($complex, $path = null) {

        if(!empty($path)) {
            return "/{$complex}/{$path}";
        } else {
            return "/{$complex}";
        }

    }

    /**
     * Выводит строку сдачи дома
     * @param $date
     * @return string
     */
    public static function completion($date) {

        $quarter = round((date('m', strtotime($date)) / 3));

        $year = date('Y', strtotime($date));

        return "{$quarter} квартал {$year} года";
    }

}