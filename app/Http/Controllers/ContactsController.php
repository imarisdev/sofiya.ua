<?php
namespace App\Http\Controllers;


class ContactsController extends Controller{

    public function __construct() {

    }

    /**
     * Страница контактов
     * @return mixed
     */
    public function index() {

        return view('contacts.index');
    }

}