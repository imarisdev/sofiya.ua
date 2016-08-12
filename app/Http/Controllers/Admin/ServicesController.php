<?php
namespace App\Http\Controllers\Admin;

use Cache;

class ServicesController extends AdminController {

    public function cache() {
        Cache::flush();
        header('Location: /admin/home');
    }

}