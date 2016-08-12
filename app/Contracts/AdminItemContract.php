<?php
namespace App\Contracts;

use Illuminate\Http\Request;

interface AdminItemContract {

    public function index(Request $request);

    public function create();

    public function store(Request $request);

    public function edit($id);

    public function update(Request $request);

    public function delete(Request $request);
}