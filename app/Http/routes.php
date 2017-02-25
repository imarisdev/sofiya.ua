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
        Route::post('/plans/load', array('as' => 'admin.plans.load', 'uses' => 'PlansController@load'));

        // Квартиры
        Route::get('/flats', array('as' => 'admin.flats', 'uses' => 'FlatsController@index'));
        Route::get('/flats/edit/{id}', array('as' => 'admin.flats.edit', 'uses' => 'FlatsController@edit'))->where(['id' => '[0-9]+']);
        Route::get('/flats/create', array('as' => 'admin.flats.create', 'uses' => 'FlatsController@create'));
        Route::post('/flats/save', array('as' => 'admin.flats.save', 'uses' => 'FlatsController@store'));
        Route::post('/flats/update', array('as' => 'admin.flats.save', 'uses' => 'FlatsController@update'));
        Route::post('/flats/delete', array('as' => 'admin.flats.delete', 'uses' => 'FlatsController@delete'));

        // Статьи
        Route::get('/articles', array('as' => 'admin.articles', 'uses' => 'ArticlesController@index'));
        Route::get('/articles/edit/{id}', array('as' => 'admin.articles.edit', 'uses' => 'ArticlesController@edit'))->where(['id' => '[0-9]+']);
        Route::get('/articles/create', array('as' => 'admin.articles.create', 'uses' => 'ArticlesController@create'));
        Route::post('/articles/save', array('as' => 'admin.articles.save', 'uses' => 'ArticlesController@store'));
        Route::post('/articles/update', array('as' => 'admin.articles.save', 'uses' => 'ArticlesController@update'));
        Route::post('/articles/delete', array('as' => 'admin.articles.delete', 'uses' => 'ArticlesController@delete'));

        // Страницы
        Route::get('/pages', array('as' => 'admin.pages', 'uses' => 'PagesController@index'));
        Route::get('/pages/edit/{id}', array('as' => 'admin.pages.edit', 'uses' => 'PagesController@edit'))->where(['id' => '[0-9]+']);
        Route::get('/pages/create', array('as' => 'admin.pages.create', 'uses' => 'PagesController@create'));
        Route::post('/pages/save', array('as' => 'admin.pages.save', 'uses' => 'PagesController@store'));
        Route::post('/pages/update', array('as' => 'admin.pages.save', 'uses' => 'PagesController@update'));
        Route::post('/pages/delete', array('as' => 'admin.pages.delete', 'uses' => 'PagesController@delete'));

        // SEO-mod
        Route::get('/seo', array('as' => 'admin.seo', 'uses' => 'SeoController@index'));
        Route::get('/seo/generate', array('as' => 'admin.seo.generate', 'uses' => 'SeoController@generate'));
        Route::post('/seo/generate', array('as' => 'admin.seo.generate.post', 'uses' => 'SeoController@generateStore'));
        Route::get('/seo/edit/{id}', array('as' => 'admin.seo.edit', 'uses' => 'SeoController@edit'))->where(['id' => '[0-9]+']);
        Route::get('/seo/create', array('as' => 'admin.seo.create', 'uses' => 'SeoController@create'));
        Route::post('/seo/save', array('as' => 'admin.seo.save', 'uses' => 'SeoController@store'));
        Route::post('/seo/update', array('as' => 'admin.seo.save', 'uses' => 'SeoController@update'));
        Route::post('/seo/delete', array('as' => 'admin.seo.delete', 'uses' => 'SeoController@delete'));

        // Banners
        Route::get('/banners', array('as' => 'admin.banners', 'uses' => 'BannersController@index'));
        Route::get('/banners/edit/{id}', array('as' => 'admin.banners.edit', 'uses' => 'BannersController@edit'))->where(['id' => '[0-9]+']);
        Route::get('/banners/create', array('as' => 'admin.banners.create', 'uses' => 'BannersController@create'));
        Route::post('/banners/save', array('as' => 'admin.banners.save', 'uses' => 'BannersController@store'));
        Route::post('/banners/update', array('as' => 'admin.banners.save', 'uses' => 'BannersController@update'));
        Route::post('/banners/delete', array('as' => 'admin.banners.delete', 'uses' => 'BannersController@delete'));

        // Banners
        Route::get('/video', array('as' => 'admin.video', 'uses' => 'VideoController@index'));
        Route::get('/video/edit/{id}', array('as' => 'admin.video.edit', 'uses' => 'VideoController@edit'))->where(['id' => '[0-9]+']);
        Route::get('/video/create', array('as' => 'admin.video.create', 'uses' => 'VideoController@create'));
        Route::post('/video/save', array('as' => 'admin.video.save', 'uses' => 'VideoController@store'));
        Route::post('/video/update', array('as' => 'admin.video.save', 'uses' => 'VideoController@update'));
        Route::post('/video/delete', array('as' => 'admin.video.delete', 'uses' => 'VideoController@delete'));

        // Menu
        Route::get('/menu', array('as' => 'admin.menu', 'uses' => 'MenuController@index'));
        Route::get('/menu/edit/{id}', array('as' => 'admin.menu.edit', 'uses' => 'MenuController@edit'))->where(['id' => '[0-9]+']);
        Route::get('/menu/sort/{type}', array('as' => 'admin.menu.sort', 'uses' => 'MenuController@sort'))->where(['type' => '[a-z]+']);
        Route::get('/menu/create', array('as' => 'admin.menu.create', 'uses' => 'MenuController@create'));
        Route::post('/menu/save', array('as' => 'admin.menu.save', 'uses' => 'MenuController@store'));
        Route::post('/menu/update', array('as' => 'admin.menu.save', 'uses' => 'MenuController@update'));
        Route::post('/menu/rebuild', array('as' => 'admin.menu.rebuild', 'uses' => 'MenuController@rebuild'));
        Route::post('/menu/delete', array('as' => 'admin.menu.delete', 'uses' => 'MenuController@delete'));

        // Banners
        Route::get('/gallery', array('as' => 'admin.gallery', 'uses' => 'GalleryController@index'));
        Route::get('/gallery/edit/{id}', array('as' => 'admin.gallery.edit', 'uses' => 'GalleryController@edit'))->where(['id' => '[0-9]+']);
        Route::get('/gallery/create', array('as' => 'admin.gallery.create', 'uses' => 'GalleryController@create'));
        Route::post('/gallery/save', array('as' => 'admin.gallery.save', 'uses' => 'GalleryController@store'));
        Route::post('/gallery/update', array('as' => 'admin.gallery.save', 'uses' => 'GalleryController@update'));
        Route::post('/gallery/delete', array('as' => 'admin.gallery.delete', 'uses' => 'GalleryController@delete'));

    });

    Route::group(['middleware' => ['auth', 'access'], 'prefix' => 'crm', 'namespace' => 'Crm'], function () {

        Route::get('/home', array('as' => 'crm.home', 'uses' => 'HomeController@index'));

        Route::get('/search', array('as' => 'crm.search', 'uses' => 'SearchController@index'));
        Route::get('/flats/{id}', array('as' => 'crm.search.show', 'uses' => 'SearchController@show'))->where(['id' => '[0-9]+']);

        // Пользователи
        Route::get('/managers', array('as' => 'crm.managers', 'uses' => 'ManagersController@index'));
        Route::get('/managers/edit/{id}', array('as' => 'crm.managers.edit', 'uses' => 'ManagersController@edit'))->where(['id' => '[0-9]+']);
        Route::get('/managers/create', array('as' => 'crm.managers.create', 'uses' => 'ManagersController@create'));
        Route::post('/managers/save', array('as' => 'crm.managers.save', 'uses' => 'ManagersController@store'));
        Route::post('/managers/update', array('as' => 'crm.managers.save', 'uses' => 'ManagersController@update'));
        Route::post('/managers/delete', array('as' => 'crm.managers.delete', 'uses' => 'ManagersController@delete'));

    });

    Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {

        // Medialib
        Route::post('/medialib/delete', array('as' => 'admin.medialib.delete', 'uses' => 'MedialibController@delete'));

    });

    Route::get('/', array('as' => 'home.index', 'uses' => 'HomeController@index'));

    Route::get('/_debugbar/assets/stylesheets', ['as' => 'debugbar-css', 'uses' => '\Barryvdh\Debugbar\Controllers\AssetController@css']);
    Route::get('/_debugbar/assets/javascript', ['as' => 'debugbar-js', 'uses' => '\Barryvdh\Debugbar\Controllers\AssetController@js']);

    // Генплан
    Route::get('/genplan', array('as' => 'home.genplan', 'uses' => 'HomeController@genplan'));

    // Контакты
    //Route::get('/kontakty', array('as' => 'contacts.index', 'uses' => 'ContactsController@index'));

    // Images resize
    Route::get('/uploads/images/{path}_{w}x{h}_{type}{ext}', 'ImageController@resizeImage')->where(['path' => '[a-z0-9\-\/]+', 'w' => '[0-9]+', 'h' => '[0-9]+', 'type' => '[a-zA-Z\-]+', 'ext' => '[jpg|png|gif|jpeg|JPG|PNG\.]+']);

    // News
    Route::get('/novosti', array('as' => 'articles.news', 'uses' => 'ArticlesController@news'));
    Route::get('/akciy', array('as' => 'articles.shares', 'uses' => 'ArticlesController@shares'));
    Route::get('/{type}/{id}-{slug}', array('as' => 'articles.page', 'uses' => 'ArticlesController@page'))->where(['type' => '[novosti|akciy]+', 'id' => '[0-9]+', 'slug' => '[a-z0-9\-]+']);

    // Планировки
    Route::get('/planirovki', array('as' => 'plans.index', 'uses' => 'PlansController@allPlans'));
    Route::get('/planirovki/arenda', array('as' => 'plans.type', 'uses' => 'PlansController@rent'));
    Route::get('/planirovki/kvartiry-s-remontom', array('as' => 'plans.type', 'uses' => 'PlansController@decoration'));
    Route::get('/planirovki/{type}', array('as' => 'plans.type', 'uses' => 'PlansController@typePlans'));
    Route::get('/planirovki/{type}/{id}-{plan}', array('as' => 'plans.plan', 'uses' => 'PlansController@plan'))->where(['type' => '[a-z0-9\-]+', 'id' => '[0-9]+', 'plan' => '[a-z0-9\-]+']);

    // Улицы
    Route::get('/ulitsy', array('as' => 'street.index', 'uses' => 'StreetController@index'));
    Route::get('/ulitsy/{sid}-{street}', array('as' => 'street.street', 'uses' => 'StreetController@street'))->where(['sid' => '[0-9]+', 'street' => '[A-Za-z0-9\-]+']);
    Route::get('/ulitsy/{sid}-{street}/{id}-{house}', array('as' => 'street.house', 'uses' => 'StreetController@house'))->where(['sid' => '[0-9]+', 'street' => '[A-Za-z0-9\-]+', 'id' => '[0-9]+', 'house' => '[a-z0-9\-]+']);

    // Видео
    Route::get('/video', array('as' => 'video.index', 'uses' => 'VideoController@index'));

    // Фото
    Route::get('/foto', array('as' => 'photo.index', 'uses' => 'PhotoController@index'));

    // Страница дома
    Route::get('/sofievskaya-borshagovka/{id}-{house}', array('as' => 'house.index', 'uses' => 'HouseController@index'))->where(['id' => '[0-9]+', 'house' => '[a-z0-9\-]+']);

    // Страница комплекса
    Route::get('/complex/{complex}', array('as' => 'complex.index', 'uses' => 'ComplexController@index'))->where(['complex' => '[A-Za-z0-9\-]+']);
    //Route::get('/complex/{complex}/foto', array('as' => 'complex.gallery', 'uses' => 'ComplexController@gallery'))->where(['complex' => '[A-Za-z0-9\-]+']);
    //Route::get('/complex/{complex}/video', array('as' => 'complex.video', 'uses' => 'ComplexController@video'))->where(['complex' => '[A-Za-z0-9\-]+']);
    //Route::get('/complex/{complex}/shkola-i-sadik', array('as' => 'complex.kids', 'uses' => 'ComplexController@kids'))->where(['complex' => '[A-Za-z0-9\-]+']);

    // Страница типа планировки
    Route::get('/complex/{complex}/pod-klyuch', array('as' => 'planstype.key', 'uses' => 'PlansTypeController@key'))->where(['complex' => '[A-Za-z0-9\-]+']);
    Route::get('/complex/{complex}/planirovki/arenda', array('as' => 'planstype.arenda', 'uses' => 'PlansTypeController@rent'))->where(['complex' => '[A-Za-z0-9\-]+', 'type' => '[a-z0-9\-]+']);
    Route::get('/complex/{complex}/planirovki/kvartiry-s-remontom', array('as' => 'planstype.decoration', 'uses' => 'PlansTypeController@decoration'));
    Route::get('/complex/{complex}/planirovki/{type}', array('as' => 'planstype.index', 'uses' => 'PlansTypeController@index'))->where(['complex' => '[A-Za-z0-9\-]+', 'type' => '[a-z0-9\-]+']);

    // Поиск
    Route::get('/search', array('as' => 'search.index', 'uses' => 'SearchController@index'));

    // Страницы
    Route::get('/{page}', array('as' => 'pages.page', 'uses' => 'PagesController@page'))->where(['page' => '[a-z\-\_\\\/]+']);

});