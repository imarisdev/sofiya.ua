var elixir = require('laravel-elixir');

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
        'site/common.js',
    ], 'public/js/common.js');
});

elixir(function (mix) {
    mix.scripts([
        'owl/owl-carousel.js',
    ], 'public/js/owl-carousel.js');
});

//Version
elixir(function (mix) {
    mix.version([
        'css/all.css',
        'js/common.js',
        'css/owl-carousel.css',
        'js/owl-carousel.js',
    ]);
});