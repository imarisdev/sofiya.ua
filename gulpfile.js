var elixir = require('laravel-elixir');

elixir(function (mix) {
    mix.styles([
        'site/animate.css',
        'site/style.css'
    ], 'public/css/all.css');
});

elixir(function (mix) {
    mix.scripts([
        'jquery.min.js',
        'wow.js',
        'site/common.js',
    ], 'public/js/common.js');
});

//Version
elixir(function (mix) {
    mix.version([
        'css/all.css',
        'js/common.js',
    ]);
});