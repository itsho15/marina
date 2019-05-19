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
/*
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
*/


mix.styles([
    'public/css/materialize.css',
    'public/css/bootstrap.css',
    'public/css/bootstrap-theme.css',
    'public/css/bootstrap-clockpicker.min.css',
    'public/css/ekko-lightbox.css',
    'public/css/font-awesome.css',
    'public/css/fonts.css',
    'public/css/owl.carousel.css',
    'public/css/owl.theme.css',
    'public/css/animate.css',
    'public/css/timepicki.css',
    'public/css/hover.css',
    'public/css/w3Picker.css',
    'public/css/sidebar.css',
], 'public/css/all.css');

mix.scripts([
    'public/js/jquery-1.11.0.min.js',
    'public/js/bootstrap.js',
    'public/js/bootstrap-carousel.js',
    'public/js/owl.carousel.js',
    'public/js/wow.min.js',
    'public/js/responsiveCarousel.min.js',
    'public/js/materialize.js',
    'public/js/ekko-lightbox.js',
    'public/js/jquery.tooltipster.min.js',
    'public/js/jquery.validate.min.js',
    'public/js/bootstrap-clockpicker.min.js',
    'public/js/jquery.smoothState.js',
    'public/js/hijri-date.js',
    'public/js/datepicker.js',
    'public/js/timepicki.js',
    'public/js/select2.js',
    'public/js/java.js',

], 'public/js/all.js');