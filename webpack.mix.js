let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js').version().extract(['vue']);
mix.sass('resources/assets/sass/app.scss', 'public/css')
   .styles([
        'resources/assets/css/animate.css',
        'resources/assets/css/icomoon.css',
        'resources/assets/css/style.css'
    ], 'public/css/all.css')


mix.webpackConfig({
    resolve: {
        alias: {
            'js': path.resolve(__dirname, 'resources/assets/js/scripts')
        }
    }
});
