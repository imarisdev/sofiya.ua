<?php

Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/', array('as' => 'home.page', 'uses' => 'HomeController@index'));


    Route::get('/{complex}/', array('as' => 'complex.index', 'uses' => 'ComplexController@index'))->where(['complex' => '[A-Za-z0-9\-]+']);

});