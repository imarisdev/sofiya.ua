var elixir = require('laravel-elixir');

elixir(function (mix) {
    mix.styles([
        'site/animate.css',
        'site/style.css'
    ], 'public/css/all.css');
});
