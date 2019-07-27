const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

// mix.styles([
//     'public/css/bootstrap.min.css',
//     'public/css/icon.css',
//     'public/css/loader.css',
//     'public/css/idangerous.swiper.css',
//     'public/css/jquery-ui.css',
//     'public/css/stylesheet.css',
//     'public/css/magnific.css'
//  ], 'public/css/plantilla.css')
// .scripts([
//     'public/adminlte/bower_components/jquery/dist/jquery.min.js',
//     'public/adminlte/bower_components/bootstrap/js/bootstrap.min.js',
//     'public/adminlte/js/adminlte.min.js',
//     'public/adminlte/js/bower_components/datatables.net/js/jquery.dataTables.min.js',
//     'public/adminlte/js/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'
//   ], 'public/js/plantilla.js')
// .js('resources/js/app.js','public/js');

