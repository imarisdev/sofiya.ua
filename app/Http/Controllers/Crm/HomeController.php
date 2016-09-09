<?php
namespace App\Http\Controllers\Crm;

class HomeController extends CrmController {


    public function index() {

        return view('crm.home.index');

    }

}