<?php
namespace App\Helpers;

use DB;
use View;
use App\Models\Articles;

class Helpers {


    /**
     * Возвращает ссылку на картинку
     * @param null $file
     * @param null $size
     * @param null $empty
     * @param string $resize_type
     * @return null|string
     */
    public static function getImage($file = null, $size = null, $empty = 'http://placehold.it/', $resize_type = 'resize') {
        if (empty($file)) {
            $sizes = explode('x', $size);

            if(!empty($sizes[0]) && !empty($sizes[1])) {
                return $empty . $size;
            } else if(!empty($size)) {
                $size = ($sizes[0] != '0') ? "{$sizes[0]}x{$sizes[0]}" : "{$sizes[1]}x{$sizes[1]}";
                return $empty . $size;
            } else {
                return $empty;
            }

        } else {

            if(isset($file) && !empty($file)) {
                $file = @unserialize($file);
            }

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
    public static function getMenu($position, $order = 'sort') {

       $menu = DB::table('menu')
           ->select('id', 'title', 'path', 'external')
           ->where('position', '=', $position)
           ->where('status', '=', 1)
           ->where('parent', '=', 0)
           ->orderBy($order, 'asc')
           ->get();

        foreach($menu as $key => $item) {
            $menu[$key]->child = self::getMenuChild($item->id);
            if($item->external == 0) {
                $menu[$key]->link = "/{$item->path}";
            } else {
                $menu[$key]->link = $item->path;
            }

        }

        return $menu;
        //return self::buildMenu((array) $menu);

    }

    private static function getMenuChild($parent) {
        $childs = DB::table('menu')
            ->select('id', 'title', 'path', 'external')
            ->where('parent', '=', $parent)
            ->where('status', '=', 1)
            ->orderBy('sort', 'asc')
            ->get();

        foreach($childs as $key => $item) {
            $childs[$key]->link = "/{$item->path}";
        }

        return $childs;
    }

    /**
     * Рекурсивно строит меню
     * @param $items
     * @return array
     */
    private static function buildMenu($items) {

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

    /**
     * Ссылка на файл баннера
     * @param $file
     * @param $type
     * @param null $size
     */
    public static function getBannerFile($file, $type, $size = null, $link = null, $class = null) {

        $resource = @unserialize($file);

        if($type == 1) {
            $file = $resource['file'] . $resource['ext'];

            $view = View::make('banners.image', ['link' => $link, 'file' => $file, 'size' => $size, 'class' => $class]);
        } else if($type == 2) {
            $file = $resource['file'] . $resource['ext'];

            $view = View::make('banners.flash', ['file' => $file, 'size' => $size, 'class' => $class]);
        }

        return $view->render();
    }

    /**
     * Вызова банера
     * @param $position
     */
    public static function getBanners($position, $class = null) {

        $banners = DB::table('banners')
            ->where('position', '=', $position)
            ->orderBy('sort', 'asc')
            ->get();

        $data = null;

        foreach ($banners as $banner) {
            $data .= self::getBannerFile($banner->file, $banner->type, ['width' => $banner->width, 'height' => $banner->height], $banner->link, $class);
        }

        return $data;
    }

    /**
     * Список материалов
     * @param $type
     * @param int $limit
     * @return array
     */
    public static function getArticlesByType($type, $limit = 5) {

        $news = Articles::select('id', 'title', 'slug', 'created_at', 'type', 'views', 'image')
            ->where('type', '=', $type)
            //->where('status', '=', 1)
            ->orderBy('created_at', 'desc')
            ->take($limit)
            ->get();

        return $news;
    }
}