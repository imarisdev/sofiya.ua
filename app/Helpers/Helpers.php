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
    public static function getMenu($position) {

       $menu = DB::table('menu')
            ->where('position', '=', $position)
            ->where('status', '=', 1)
            ->orderBy('order', 'asc')
            ->get();

       return $menu;

    }


}