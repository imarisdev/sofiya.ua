var elixir = require('laravel-elixir');

/**
 * Файлы для сайта
 */
elixir(function (mix) {
    mix.styles([
        'site/flexslider.css',
        'site/jquery.fancybox.css',
       // 'site/slider.css',
        //'site/animate.css',
        'site/style.css'
    ], 'public/css/all.css');
});


elixir(function (mix) {
    mix.scripts([
        'jquery.min.js',
       // 'wow.js',
        'fancybox/jquery.mousewheel.pack.js',
        'fancybox/jquery.fancybox.pack.js',
        'tabs.js',
        'jquery.flexslider.js',
        'jquery.fancybox.pack.js',
        //'jquery.ceebox.js',
        'site/slider.js',
        'site/comments.js',
        'site/common.js',
    ], 'public/js/common.js');
});

/**
 * Файлы админки
 */

elixir(function (mix) {
    mix.styles([
        'admin/select2.min.css',
        'admin/bootstrap.min.css',
        'admin/datepicker3.css',
        'admin/font-awesome.min.css',
        'admin/AdminLTE.min.css',
        'admin/skins/skin-blue.css',
        'admin/sortable.css',
        'admin/uploadfile.css',
        'admin/common.css'
    ], 'public/css/admin-common.css');
});

elixir(function (mix) {
    mix.scripts([
        'jquery.min.js',
        'ejs_production.js',
        'admin/bootstrap.min.js',
        'admin/bootstrap-datepicker.js',
        'admin/select2.full.min.js',
        'admin/jquery.uploadfile.min.js',
        'admin/app.min.js',
        'admin/jquery-sortable-lists.min.js',
        'admin/medialib.js',
        'admin/common.js'
    ], 'public/js/admin-common.js');
});

/**
 * CRM
 */

elixir(function (mix) {
    mix.styles([
        'admin/select2.min.css',
        'admin/bootstrap.min.css',
        'admin/datepicker3.css',
        'admin/font-awesome.min.css',
        'admin/AdminLTE.min.css',
        'admin/skins/skin-blue.css',
        'crm/common.css'
    ], 'public/css/crm-common.css');
});

elixir(function (mix) {
    mix.scripts([
        'jquery.min.js',
        'admin/bootstrap.min.js',
        'admin/bootstrap-datepicker.js',
        'admin/select2.full.min.js',
        'admin/app.min.js',
        'admin/common.js',
        'crm/common.js'
    ], 'public/js/crm-common.js');
});

//Version
elixir(function (mix) {
    mix.version([
        'css/all.css',
        'js/common.js',

        //'css/owl-carousel.css',
       // 'js/owl-carousel.js',


        'css/admin-common.css',
        'js/admin-common.js',

        'css/crm-common.css',
        'js/crm-common.js'
    ]);
});
