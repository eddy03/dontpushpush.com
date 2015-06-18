var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
 mix.less('app.less')
     .copy('resources/bower_components/jquery/dist/jquery.js', 'resources/assets/js/jquery.js')
     .copy('resources/bower_components/bootstrap/dist/js/bootstrap.js', 'resources/assets/js/bootstrap.js')
     .copy('resources/bower_components/headhesive/dist/headhesive.js', 'resources/assets/js/headhesive.js')
     .scripts(['ie10-viewport-bug-workaround.js', 'jquery.js', 'bootstrap.js', 'headhesive.js' ])
     .version(['css/app.css', 'js/all.js']);
});
