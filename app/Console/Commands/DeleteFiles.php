<?php

namespace App\Console\Commands;

use Config;
use Illuminate\Console\Command;

class DeleteFiles extends Command {

    protected $signature = 'deletefiles';

    public function handle() {

        $folder = public_path() . Config::get('filesystems.folder.images');

        $fileName = '*.jpg';

        $file_list = [];

        $files = $this->fileList($folder, $folder, $file_list);
    }

    public function fileList($path, $with_dir, &$file_list) {

        if ($handle = opendir($path)) {
            $ok = true;
            while (false !== ($file = readdir($handle))) {
                if ($file == '.' || $file == '..')
                    continue;
                $file = $path . "/" . $file;

                if (is_dir($file)) {
                    if ($with_dir)
                        $file_list[] = $file; // iconv('windows-1251', 'UTF-8',$file);
                    if (!$this->fileList($file, $with_dir, $file_list)) {
                        $ok = false;
                        break;
                    }
                } else {
                    $file_list[] = $file; // iconv('windows-1251', 'UTF-8',$file);
                }

                preg_match('/([0-9]+x[0-9]+)_([a-z\-]+\.([a-z]+))/', $file, $m);

                if(isset($m[0]) && !empty($m[0])) {
                    echo $file . "\n";
                    unlink($file);
                }
            }
            closedir($handle);
            return $ok;
        }else
            return false;
    }

}