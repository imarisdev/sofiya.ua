<?php
namespace App\Http\Controllers;

use Image;
use Config;
use Response;
use Illuminate\Http\Request;

class ImageController extends Controller {

    /**
     * Получает запрос на ресайх картинки под нужные размеры и сохраняет в файловую систему
     * Запрос идет через nginx, если он не находит картинку в ФС, перенаправляет на php
     * @param $path
     * @param int $w
     * @param int $h
     * @param $ext
     * @return mixed
     */
    public function resizeImage($path, $w = 0, $h = 0, $type = 'resize', $ext, $watermark = false) {

        if(!in_array($type, ['resize', 'fit', 'resizeCanvas', 'crop', 'trim', 'resize-w', 'fit-w'])) {
            $type = 'resize';
        }

        if(!empty(explode('-', $type)[1])) {
            $type = explode('-', $type)[0];
            $watermark = true;
        }

        $image_file =  public_path() . Config::get('filesystems.folder.images') . $path;

        if(file_exists($image_file)) {
            if($w > 0 && $h > 0) {
                $img = Image::make($image_file)->{$type}($w, $h);
            } else if($w > 0) {
                $img = Image::make($image_file)->{$type}($w, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            } else if($h > 0) {
                $img = Image::make($image_file)->{$type}(null, $h, function ($constraint) {
                    $constraint->aspectRatio();
                });
            } else {
                abort(404);
            }

            if($watermark) {
                $wt = Image::make(public_path() . '/img/watermark.png')->resize(($w * 0.5), null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->insert($wt, 'bottom-right', 10, 10);

                $img->save($image_file . '_' . $w . 'x' . $h . '_' . $type . '-w' . $ext);
            } else {
                $img->save($image_file . '_' . $w . 'x' . $h . '_' . $type . $ext);
            }


        } else {
            if($w > 0 && $h > 0) {
                $img = Image::canvas($w, $h, '#efefef')->text('No image', 10, 10, function ($font) {
                    $font->file(public_path() . '/fonts/rupee_foradian-webfont.ttf');
                    $font->size(24);
                    $font->color('#999999');
                    $font->align('left');
                    $font->valign('top');
                });
            } else {
                abort(404);
            }
        }

        return $img->response();
    }

    /**
     * Сохранение картинки с кропера base64 to file
     * @param Request $request
     * @return array
     */
    public function cropper(Request $request) {
        $file = $request->input('file');
        $file = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $file));

        try {
            $image = $this->upload($file, 'base64');
            $image['serialize'] = serialize($image);
            return response()->json(['image' => $image]);
        } catch(\Exception $e) {
            return ['error' => true, 'msg' => array($e->getMessage())];
        }
    }

}