<?php
namespace App\Http\Controllers;

use Image;
use Config;
use Response;
use Illuminate\Http\Request;

class ImageController extends Controller {

    private static $sizes = array(
        'full' => array('w' => 1024, 'h' => 768)
    );

    /**
     * Сохранение оригинала картинки
     * @param $file
     * @return array|void
     */
    public function saveFile($file, $type = 'file', $ext = '.png') {

        if($type == 'file') {
            $file = $file->getRealPath();

            $image_info = getimagesize(trim((string)$file));

            // Тип изображения
            if ($image_info[2] == IMAGETYPE_JPEG) {
                $ext = '.jpg';
            } elseif ($image_info[2] == IMAGETYPE_GIF) {
                $ext = '.gif';
            } elseif ($image_info[2] == IMAGETYPE_PNG) {
                $ext = '.png';
            } else {
                return;
            }
        }

        $file_name = $this->getUuid();

        // Путь к файлу
        $file_path = substr($file_name, 0, 2) . '/' . substr($file_name, 2, 2) . '/' . substr($file_name, 4, 2) . '/';

        $upload_path = public_path() . Config::get('filesystems.folder.uploads') . $file_path;

        mkdir($upload_path, 0777, true);
        chown($upload_path, Config::get('filesystems.fileowner'));

        $img = Image::make($file);

        //$img->resize(self::$sizes['full']);

        $img->save($upload_path . $file_name);
        $img->save($upload_path . $file_name . $ext);

        return array('file' => Config::get('filesystems.folder.uploads') . $file_path . $file_name, 'ext' => $ext);
    }

    /**
     * Загрузка картинок
     * @param Request $request
     * @return array
     */
    public function uploadFile(Request $request) {
        $file = $request->file('images');

        if ($file->getPathName() !== null) {

            $image = $this->uploadFile($file);

            return $image;
        }
    }

    /**
     * Загрузка картинок
     * @param Request $request
     * @return mixed
     */
    public function multipleUpload(Request $request) {
        $file = $request->file('images');

        if ($file->getPathName() !== null) {

            $image = $this->upload($file);

            return response()->json(['image' => serialize($image)]);
        }
    }

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

        $image_file =  public_path() . self::$uploads_folder . $path;

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
                $wt = Image::make(public_path() . '/img/likarInfo-vt2.png')->resize(($w * 0.5), null, function ($constraint) {
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