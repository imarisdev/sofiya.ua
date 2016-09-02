<?php
namespace App\Repositories;

use Config;
use Validator;
use Response;
use File;
use Illuminate\Support\Facades\Storage;

class FileRepository extends BaseRepository {

    protected $rules = [
        'file' => 'required|mimes:pdf,doc,swf'
    ];

    public function __construct() {

    }

    /**
     * Сохранение файлов
     * @param $file
     * @return array
     */
    public function saveFile($file) {

        try {

            $ext = explode('.', $file->getClientOriginalName());
            $ext = "." . array_pop($ext);

            $file_name = $this->getUuid();

            // Путь к файлу
            $file_path = substr($file_name, 0, 2) . '/' . substr($file_name, 2, 2) . '/' . substr($file_name, 4, 2) . '/';

            $upload_path = Config::get('filesystems.folder.files') . $file_path;

            mkdir(public_path() . $upload_path, 0777, true);
            chown(public_path() . $upload_path, Config::get('filesystems.fileowner'));

            //Storage::put($upload_path . $file_name . $ext, $file);

            Storage::disk('uploads')->put($upload_path . $file_name . $ext, File::get($file));

            return array('file' => Config::get('filesystems.folder.files') . $file_path . $file_name, 'ext' => $ext);
        } catch(\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Загрузка файла
     * @param $file
     * @return null|string
     */
    public function uploadFile($file) {

        if(!empty($file) && $file != 'undefined') {

            $validator = Validator::make(array('file'=> $file), $this->rules);

            if($validator->passes() && $file->getPathName() !== null) {

                $file = $this->saveFile($file);

                if (!empty($file)) {
                    return serialize($file);
                } else {
                    return null;
                }

            } else {
                return null;
                //throw new \Exception($validator->errors());
            }
        }
    }
}