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
    public function saveFile($file, $type = 'file', $ext = '.png') {

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

            $upload_path = public_path() . Config::get('filesystems.folder.uploads') . $file_path;

            mkdir($upload_path, 0777, true);
            chown($upload_path, Config::get('filesystems.fileowner'));

            $img = Image::make($file);

            //$img->resize(self::$sizes['full']);

            $img->save($upload_path . $file_name);
            $img->save($upload_path . $file_name . $ext);

            return array('file' => Config::get('filesystems.folder.uploads') . $file_path . $file_name, 'ext' => $ext);
        } catch(\Exception $e) {
            dd($e->getMessage());
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

                $image = $this->saveFile($file);

                if (!empty($image)) {
                    return serialize($image);
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
    public function multipleUploadImage($files) {

        $images = [];

        foreach($files as $file) {

            $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
            $validator = Validator::make(array('file'=> $file), $rules);

            if($validator->passes() && $file->getPathName() !== null) {

                $image = $this->saveFile($file);

                if(!empty($image)) {
                    $images[] = $image;
                }
            }
        }

        return $images;
    }

}