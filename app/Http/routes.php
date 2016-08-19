<?php

Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::group(['middleware' => ['auth', 'access'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {

        Route::get('/home', array('as' => 'admin.home', 'uses' => 'HomeController@index'));

        // Сервисы
        Route::get('/cache', array('as' => 'admin.cache', 'uses' => 'ServicesController@cache'));

        // Пользователи
        Route::get('/users', array('as' => 'admin.users', 'uses' => 'UsersController@index'));
        Route::get('/users/edit/{id}', array('as' => 'admin.users.edit', 'uses' => 'UsersController@edit'))->where(['id' => '[0-9]+']);
        Route::get('/users/create', array('as' => 'admin.users.create', 'uses' => 'UsersController@create'));
        Route::post('/users/save', array('as' => 'admin.users.save', 'uses' => 'UsersController@store'));
        Route::post('/users/update', array('as' => 'admin.users.save', 'uses' => 'UsersController@update'));
        Route::post('/users/delete', array('as' => 'admin.users.delete', 'uses' => 'UsersController@delete'));

        // Комплексы
        Route::get('/complex', array('as' => 'admin.complex', 'uses' => 'ComplexController@index'));
        Route::get('/complex/edit/{id}', array('as' => 'admin.complex.edit', 'uses' => 'ComplexController@edit'))->where(['id' => '[0-9]+']);
        Route::get('/complex/create', array('as' => 'admin.complex.create', 'uses' => 'ComplexController@create'));
        Route::post('/complex/save', array('as' => 'admin.complex.save', 'uses' => 'ComplexController@store'));
        Route::post('/complex/update', array('as' => 'admin.complex.save', 'uses' => 'ComplexController@update'));
        Route::post('/complex/delete', array('as' => 'admin.complex.delete', 'uses' => 'ComplexController@delete'));

        // Улицы
        Route::get('/streets', array('as' => 'admin.streets', 'uses' => 'StreetsController@index'));
        Route::get('/streets/edit/{id}', array('as' => 'admin.streets.edit', 'uses' => 'StreetsController@edit'))->where(['id' => '[0-9]+']);
        Route::get('/streets/create', array('as' => 'admin.streets.create', 'uses' => 'StreetsController@create'));
        Route::post('/streets/save', array('as' => 'admin.streets.save', 'uses' => 'StreetsController@store'));
        Route::post('/streets/update', array('as' => 'admin.streets.save', 'uses' => 'StreetsController@update'));
        Route::post('/streets/delete', array('as' => 'admin.streets.delete', 'uses' => 'StreetsController@delete'));

        // Дома
        Route::get('/houses', array('as' => 'admin.houses', 'uses' => 'HousesController@index'));
        Route::get('/houses/edit/{id}', array('as' => 'admin.houses.edit', 'uses' => 'HousesController@edit'))->where(['id' => '[0-9]+']);
        Route::get('/houses/create', array('as' => 'admin.houses.create', 'uses' => 'HousesController@create'));
        Route::post('/houses/save', array('as' => 'admin.houses.save', 'uses' => 'HousesController@store'));
        Route::post('/houses/update', array('as' => 'admin.houses.save', 'uses' => 'HousesController@update'));
        Route::post('/houses/delete', array('as' => 'admin.houses.delete', 'uses' => 'HousesController@delete'));

        // Планировки
        Route::get('/plans', array('as' => 'admin.plans', 'uses' => 'PlansController@index'));
        Route::get('/plans/edit/{id}', array('as' => 'admin.plans.edit', 'uses' => 'PlansController@edit'))->where(['id' => '[0-9]+']);
        Route::get('/plans/create', array('as' => 'admin.plans.create', 'uses' => 'PlansController@create'));
        Route::post('/plans/save', array('as' => 'admin.plans.save', 'uses' => 'PlansController@store'));
        Route::post('/plans/update', array('as' => 'admin.plans.save', 'uses' => 'PlansController@update'));
        Route::post('/plans/delete', array('as' => 'admin.plans.delete', 'uses' => 'PlansController@delete'));



    });

    Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {

        // Medialib
        Route::post('/medialib/delete', array('as' => 'admin.medialib.delete', 'uses' => 'MedialibController@delete'));

    });

    Route::get('/', array('as' => 'home.page', 'uses' => 'HomeController@index'));

    // Контакты
    Route::get('/kontakty', array('as' => 'contacts.index', 'uses' => 'ContactsController@index'));

    // Images resize
    Route::get('/uploads/{path}_{w}x{h}_{type}{ext}', 'ImageController@resizeImage')->where(['path' => '[a-z0-9\-\/]+', 'w' => '[0-9]+', 'h' => '[0-9]+', 'type' => '[a-zA-Z\-]+', 'ext' => '[jpg|png|gif|jpeg|JPG|PNG\.]+']);

    // News
    Route::get('/novosti', array('as' => 'news.index', 'uses' => 'NewsController@index'));

    // Планировки
    Route::get('/planirovki', array('as' => 'plans.index', 'uses' => 'PlansController@allPlans'));
    Route::get('/planirovki/{type}', array('as' => 'plans.type', 'uses' => 'PlansController@typePlans'));
    Route::get('/planirovki/{type}/{id}-{plan}', array('as' => 'plans.plan', 'uses' => 'PlansController@plan'))->where(['type' => '[a-z0-9\-]+', 'id' => '[0-9]+', 'plan' => '[a-z0-9\-]+']);

    // Улицы
    Route::get('/ulitsy', array('as' => 'street.index', 'uses' => 'StreetController@index'));
    Route::get('/ulitsy/{sid}-{street}', array('as' => 'street.street', 'uses' => 'StreetController@street'))->where(['sid' => '[0-9]+', 'street' => '[A-Za-z0-9\-]+']);
    Route::get('/ulitsy/{sid}-{street}/{id}-{house}', array('as' => 'street.house', 'uses' => 'StreetController@house'))->where(['sid' => '[0-9]+', 'street' => '[A-Za-z0-9\-]+', 'id' => '[0-9]+', 'house' => '[a-z0-9\-]+']);

    // Страница дома
    Route::get('/doma/{id}-{house}', array('as' => 'house.index', 'uses' => 'HouseController@index'))->where(['id' => '[0-9]+', 'house' => '[a-z0-9\-]+']);

    // Страница комплекса
    Route::get('/{complex}', array('as' => 'complex.index', 'uses' => 'ComplexController@index'))->where(['complex' => '[A-Za-z0-9\-]+']);
    Route::get('/{complex}/photo-gallery', array('as' => 'complex.gallery', 'uses' => 'ComplexController@gallery'))->where(['complex' => '[A-Za-z0-9\-]+']);
    Route::get('/{complex}/video', array('as' => 'complex.video', 'uses' => 'ComplexController@video'))->where(['complex' => '[A-Za-z0-9\-]+']);
    Route::get('/{complex}/kids-study', array('as' => 'complex.kids', 'uses' => 'ComplexController@kids'))->where(['complex' => '[A-Za-z0-9\-]+']);

    // Страница типа планировки
    Route::get('/{complex}/pod-klyuch', array('as' => 'planstype.key', 'uses' => 'PlansTypeController@key'))->where(['complex' => '[A-Za-z0-9\-]+']);
    Route::get('/{complex}/{type}', array('as' => 'planstype.index', 'uses' => 'PlansTypeController@index'))->where(['complex' => '[A-Za-z0-9\-]+', 'type' => '[a-z0-9\-]+']);

});