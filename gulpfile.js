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
    //Compile LESS
    mix.less('app.less')
        .less('administrator.less')

        //Copy all CSS files to desire location (resources/assets/css)
        .copy('resources/bower_components/lightbox2/dist/css/lightbox.css', 'public/css/lightbox.css')
        /*.copy('resources/bower_components/prism/themes/prism.css', 'public/css/prism.css')*/

        //Copy all lightbox2 required images
        .copy('resources/bower_components/lightbox2/dist/images', 'public/images')

        //Copy all JS file to desire location (resources/assets/js)
        .copy('resources/bower_components/jquery/dist/jquery.js', 'resources/assets/js/jquery.js')
        .copy('resources/bower_components/bootstrap/dist/js/bootstrap.js', 'resources/assets/js/bootstrap.js')
        .copy('resources/bower_components/headhesive/dist/headhesive.js', 'resources/assets/js/headhesive.js')
        .copy('resources/bower_components/metisMenu/dist/metisMenu.js', 'resources/assets/js/metisMenu.js')
        .copy('resources/bower_components/autosize/dist/autosize.js', 'resources/assets/js/autosize.js')
        .copy('node_modules/marked/marked.min.js', 'resources/assets/js/marked.js')
        .copy('resources/bower_components/selectize/dist/js/standalone/selectize.js', 'resources/assets/js/selectize.js')
        .copy('resources/bower_components/lightbox2/dist/js/lightbox.js', 'resources/assets/js/lightbox.js')
        .copy('resources/bower_components/vue/dist/vue.js', 'resources/assets/js/vue.js')
        .copy('resources/bower_components/director/build/director.js', 'resources/assets/js/director.js')
        .copy('resources/bower_components/bootbox.js/bootbox.js', 'resources/assets/js/bootbox.js')
        .copy('resources/bower_components/lodash/lodash.js', 'resources/assets/js/lodash.js')
        /*.copy('resources/bower_components/prism/prism.js', 'resources/assets/js/prism.js')*/

        //Compile JS file according to specific user target
        .scripts(['ie10-viewport-bug-workaround.js', 'jquery.js', 'vue.js', 'bootstrap.js', 'marked.js', 'lightbox.js', 'prism.js', 'autosize.js', 'selectize.js', 'bootbox.js', 'lodash.js'], 'public/js/administrator.js')
        .scripts(['article.js'], 'public/js/article.js')
        .scripts(['ie10-viewport-bug-workaround.js', 'jquery.js', 'vue.js', 'bootstrap.js', 'marked.js', 'lightbox.js', 'prism.js', 'headhesive.js', 'director.js'], 'public/js/app.js')

        //Mixing the css files
        .styles(['lightbox.css', 'prism.css', 'administrator.css'], 'public/css/admin.css', 'public/css')
        .styles(['lightbox.css', 'prism.css',  'app.css'], 'public/css/dontpushpush.css', 'public/css')

        //Versioning all the files
        .version(['css/dontpushpush.css', 'css/admin.css', 'js/app.js', 'js/article.js', 'js/administrator.js'])
});
