<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use Response;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController {
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function __construct() {

    }

    public function checkURL($link) {
        $requestPath = \Request::server('REQUEST_URI');

        if ($queryString = \Request::server('QUERY_STRING')) {
            $link = $link . "?" . $queryString;
        }

        if ($requestPath != $link) {
            header("Location: " . $link, 301, true);
        }
    }
}
