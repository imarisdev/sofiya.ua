<?php

Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/', array('as' => 'home.page', 'uses' => 'HomeController@index'));
    Route::get('/clear/', array('as' => 'home.clear', 'uses' => 'HomeController@clear'));

    // Images resize
    Route::get('/uploads/{path}_{w}x{h}_{type}{ext}', 'ImageController@resizeImage')->where(['path' => '[a-z0-9\-\/]+', 'w' => '[0-9]+', 'h' => '[0-9]+', 'type' => '[a-zA-Z\-]+', 'ext' => '[jpg|png|gif|jpeg|JPG|PNG\.]+']);

    // News
    Route::get('/novosti/', array('as' => 'news.index', 'uses' => 'NewsController@index'));

    // Планировки
    Route::get('/planirovki/', array('as' => 'plans.index', 'uses' => 'PlansController@allPlans'));
    Route::get('/planirovki/{type}/', array('as' => 'plans.type', 'uses' => 'PlansController@typePlans'));

    // Страница комплекса
    Route::get('/{complex}/', array('as' => 'complex.index', 'uses' => 'ComplexController@index'))->where(['complex' => '[A-Za-z0-9\-]+']);
    Route::get('/{complex}/photo-gallery/', array('as' => 'complex.gallery', 'uses' => 'ComplexController@gallery'))->where(['complex' => '[A-Za-z0-9\-]+']);
    Route::get('/{complex}/video/', array('as' => 'complex.video', 'uses' => 'ComplexController@video'))->where(['complex' => '[A-Za-z0-9\-]+']);
    Route::get('/{complex}/kids-study/', array('as' => 'complex.kids', 'uses' => 'ComplexController@kids'))->where(['complex' => '[A-Za-z0-9\-]+']);

    // Страница типа планировки
    Route::get('/{complex}/{type}/', array('as' => 'planstype.index', 'uses' => 'PlansTypeController@index'))->where(['complex' => '[A-Za-z0-9\-]+', 'type' => '[a-z0-9\-]+']);

    // Страница дома
    Route::get('/{complex}/{type}/{id}-{house}', array('as' => 'house.index', 'uses' => 'HouseController@index'))->where(['complex' => '[A-Za-z0-9\-]+', 'type' => '[a-z0-9\-]+', 'id' => '[0-9]+', 'house' => '[a-z0-9\-]+']);

    // Страница планировки
    Route::get('/{complex}/{type}/{id}-{house}/{pid}-{plan}/', array('as' => 'plans.index', 'uses' => 'PlansController@index'))->where(['complex' => '[A-Za-z0-9\-]+', 'type' => '[a-z0-9\-]+', 'id' => '[0-9]+', 'house' => '[a-z0-9\-]+', 'pid' => '[0-9]+', 'plan' => '[a-z0-9\-]+']);

});