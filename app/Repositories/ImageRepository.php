<?php
namespace App\Repositories;

use Image;
use Config;
use Validator;
use Response;

class ImageRepository extends BaseRepository {

    public function __construct() {

    }

    /**
     * Сохранение оригинала картинки
     * @param $file
     * @return array|void
     */
    public function save($file, $type = 'file', $ext = '.png') {

        try {
            if ($type == 'file') {
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

            $upload_path = public_path() . Config::get('filesystems.folder.images') . $file_path;

            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0777, true);
            }
            chown($upload_path, Config::get('filesystems.fileowner'));

            $img = Image::make($file);

            //$img->resize(self::$sizes['full']);

            $img->save($upload_path . $file_name);
            $img->save($upload_path . $file_name . $ext);

            return array('file' => Config::get('filesystems.folder.images') . $file_path . $file_name, 'ext' => $ext);
        } catch(\Exception $e) {
            echo __METHOD__ . " : " . $e->getMessage() . "\n";
        }
    }

    /**
     * Загрузка картинок
     * @param Request $request
     * @return array
     */
    public function uploadImage($file) {

        if(!empty($file) && $file != 'undefined') {

            //$file = $file[0];

            $rules = array('file' => 'required|mimes:png,gif,jpeg'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
            $validator = Validator::make(array('file'=> $file), $rules);

            if($validator->passes() && $file->getPathName() !== null) {

                $image = $this->save($file);

                if (!empty($image)) {
                    return $image;
                } else {
                    return null;
                }

            } else {
                return null;
                //throw new \Exception($validator->errors());
            }
        }
    }

    /**
     * Загрузка массива картинок
     * @param Request $request
     * @return mixed
     */
    public function multipleUpload($files) {

        $images = [];

        foreach($files as $file) {

            $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
            $validator = Validator::make(array('file'=> $file), $rules);

            if($validator->passes() && $file->getPathName() !== null) {

                $image = $this->save($file);

                if(!empty($image)) {
                    $images[] = $image;
                }
            }
        }

        return $images;
    }

    /**
     * Информация о файле
     * @param $file
     * @return array
     */
    public function getImageInfo($file) {
        if (file_exists($file)) {

            list($width, $height, $type, $attr) = getimagesize(trim((string)$file));
            $filesize = filesize(trim((string)$file));

            return [
                'width' => $width,
                'height' => $height,
                'type' => $type,
                'attr' => $attr,
                'size' => $this->humanFilesize($filesize, 0)
            ];
        } else {
            return 'File not found';
        }
    }

    private function humanFilesize($bytes, $decimals = 2) {
        $sz = [
            0 => 'Байт',
            1 => 'КБ',
            2 => 'МБ',
            3 => 'ГБ',
            4 => 'ТБ',
            5 => 'ПБ'
        ];
        //$sz = 'BKMGTP';
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . ' ' .@$sz[$factor];
    }

    /**
     * Удаляет картинку с БД медиалибы и физически с диска
     * @param $fields
     */
    public static function deleteImage($file) {

        $file = @unserialize($file);
        if(!empty($file)) {
            try {
                // Delete file
                $path = explode('/', $file['file'], 7);
                $file_name = $path[6];
                unset($path[0]);
                unset($path[6]);
                $path = '/' . implode('/', $path) . '/';

                $files = scandir(public_path() . $path);

                foreach ($files as $file) {
                    if (preg_match("/^{$file_name}/", $file)) {
                        if(file_exists(public_path() . $path . $file)) {
                            unlink(public_path() . $path . $file);
                        }
                    }
                }

                return true;

            } catch(\Exception $e) {
                throw $e;
            }

        } else {
            return Response::json(['error' => true], 400);
        }
    }

}