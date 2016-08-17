var elixir = require('laravel-elixir');

/**
 * Файлы для сайта
 */
elixir(function (mix) {
    mix.styles([
        'site/animate.css',
        'site/style.css'
    ], 'public/css/all.css');
});

elixir(function (mix) {
    mix.styles([
        'owl/owl-carousel.css',
        'owl/owl-theme.css'
    ], 'public/css/owl-carousel.css');
});

elixir(function (mix) {
    mix.scripts([
        'jquery.min.js',
        'wow.js',
        'tabs.js',
        'site/common.js',
    ], 'public/js/common.js');
});

elixir(function (mix) {
    mix.scripts([
        'owl/owl-carousel.js',
    ], 'public/js/owl-carousel.js');
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
        'admin/common.css'
    ], 'public/css/admin-common.css');
});

elixir(function (mix) {
    mix.scripts([
        'jquery.min.js',
        'admin/bootstrap.min.js',
        'admin/bootstrap-datepicker.js',
        'admin/select2.full.min.js',
        'admin/app.min.js',
        'admin/common.js'
    ], 'public/js/admin-common.js');
});

//Version
elixir(function (mix) {
    mix.version([
        'css/all.css',
        'js/common.js',

        'css/owl-carousel.css',
        'js/owl-carousel.js',


        'css/admin-common.css',
        'js/admin-common.js'
    ]);
});