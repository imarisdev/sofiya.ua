<?php

Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/', array('as' => 'home.page', 'uses' => 'HomeController@index'));
    Route::get('/clear/', array('as' => 'home.clear', 'uses' => 'HomeController@clear'));

    // News
    Route::get('/novosti/', array('as' => 'news.index', 'uses' => 'NewsController@index'));

    // Планировки
    Route::get('/planirovki/', array('as' => 'plans.index', 'uses' => 'PlansController@allPlans'));

    // Страница комплекса
    Route::get('/{complex}/', array('as' => 'complex.index', 'uses' => 'ComplexController@index'))->where(['complex' => '[A-Za-z0-9\-]+']);

    // Страница типа планировки
    Route::get('/{complex}/{type}/', array('as' => 'planstype.index', 'uses' => 'PlansTypeController@index'))->where(['complex' => '[A-Za-z0-9\-]+', 'type' => '[a-z0-9\-]+']);

    // Страница дома
    Route::get('/{complex}/{type}/{id}-{house}', array('as' => 'house.index', 'uses' => 'HouseController@index'))->where(['complex' => '[A-Za-z0-9\-]+', 'type' => '[a-z0-9\-]+', 'id' => '[0-9]+', 'house' => '[a-z0-9\-]+']);

    // Страница планировки
    Route::get('/{complex}/{type}/{id}-{house}/{pid}-{plan}/', array('as' => 'plans.index', 'uses' => 'PlansController@index'))->where(['complex' => '[A-Za-z0-9\-]+', 'type' => '[a-z0-9\-]+', 'id' => '[0-9]+', 'house' => '[a-z0-9\-]+', 'pid' => '[0-9]+', 'plan' => '[a-z0-9\-]+']);

});