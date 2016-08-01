<?php

Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/', array('as' => 'home.page', 'uses' => 'HomeController@index'));


    Route::get('/{complex}/', array('as' => 'complex.index', 'uses' => 'ComplexController@index'))->where(['complex' => '[A-Za-z0-9\-]+']);

    Route::get('/{complex}/{type}/', array('as' => 'planstype.index', 'uses' => 'PlansTypeController@index'))->where(['complex' => '[A-Za-z0-9\-]+', 'type' => '[a-z0-9\-]+']);

    Route::get('/{complex}/{type}/{id}-{house}', array('as' => 'house.index', 'uses' => 'HouseController@index'))->where(['complex' => '[A-Za-z0-9\-]+', 'type' => '[a-z0-9\-]+', 'id' => '[0-9]+', 'house' => '[a-z0-9\-]+']);


});