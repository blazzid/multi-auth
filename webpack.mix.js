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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

// mix.copyDirectory('vendor/almasaeed2010/adminlte/plugins', 'public/storage/adminlte/plugins');
// mix.copyDirectory('vendor/almasaeed2010/adminlte/dist', 'public/storage/adminlte/dist');

mix.js('resources/js/role.js', 'public/js');
mix.js('resources/js/user.js', 'public/js');
mix.js('resources/js/logActivity.js', 'public/js');