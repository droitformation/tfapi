const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js').scripts([
        'resources/assets/js/datatables.js',
        'resources/assets/js/enquire.js',
        'resources/assets/js/jquery.cookie.js',
        'resources/assets/js/jquery.nicescroll.min.js',
        'resources/assets/js/placeholdr.js',
        'resources/assets/js/modernizr.custom.js',
        'resources/assets/js/admin.js',
        'resources/assets/js/main.js',
    ], 'public/backend/js/backend.js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .styles([
    'resources/assets/css/styles.css',
    'resources/assets/css/responsive.css',
    'resources/assets/css/chosen.css',
    'resources/assets/css/chosen-bootstrap.css',
    'resources/assets/css/types.css',
    'resources/assets/css/backend.css',
], 'public/backend/css/admin.css');
