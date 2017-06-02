var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
    'libs': './resources/assets/libs/',
    'adminlte': './resources/assets/libs/AdminLTE/'
}

elixir(function(mix) {
    mix.styles([
        paths.libs + 'jquery-ui/themes/base/core.css',
        paths.libs + 'jquery-ui/themes/base/spinner.css',
        paths.libs + 'jquery-ui/themes/base/theme.css',
        paths.adminlte + 'bootstrap/css/bootstrap.min.css',
        paths.adminlte + 'dist/css/skins/skin-red.min.css',
        paths.adminlte + 'plugins/iCheck/minimal/red.css',
        paths.adminlte + 'dist/css/AdminLTE.min.css',
        paths.libs + 'font-awesome/css/font-awesome.min.css',
    ], 'public/css/vendor.min.css');
});

elixir(function(mix) {
    mix.sass('app.scss', 'public/css/app.min.css');
});

elixir(function(mix) {
    mix.scripts([

        paths.adminlte + 'plugins/jQuery/jquery-2.2.3.min.js',
        paths.libs + 'jquery-ui/ui/core.js',
        paths.libs + 'jquery-ui/ui/widget.js',
        paths.libs + 'jquery-ui/ui/spinner.js',
        paths.adminlte + 'bootstrap/js/bootstrap.min.js',
        paths.adminlte + 'dist/js/app.min.js',
        paths.adminlte + 'plugins/slimScroll/jquery.slimscroll.min.js',
        paths.adminlte + 'plugins/iCheck/icheck.min.js',
        paths.libs + 'bootstrap-validator/dist/validator.min.js',
        paths.libs + 'jquery.inputmask/dist/jquery.inputmask.bundle.js',
        paths.libs + 'jspdf/dist/jspdf.min.js',
        paths.libs + 'accounting.js/accounting.min.js',
        paths.libs + 'underscore/underscore.js',
        paths.libs + 'backbone/backbone.js',
        paths.libs + 'moment/moment.js',
        paths.libs + 'moment/locale/es.js',
        paths.libs + 'alertify.js/dist/js/alertify.js',
    ], 'public/js/vendor.min.js')
    .scripts([
        'models/*.js',
        'collections/**/*.js',
        'views/**/*.js',
        'helpers/misc.js',
        'helpers/routes.js',
        'routes.js',
        'init.js'
    ], 'public/js/app.min.js')
});

elixir(function(mix) {
    mix.copy(paths.adminlte + 'bootstrap/fonts/', 'public/fonts');
    mix.copy(paths.adminlte + 'plugins/iCheck/minimal/red**.png', 'public/css');
    mix.copy(paths.libs + 'font-awesome/fonts/', 'public/fonts');
    mix.copy(paths.libs + 'jquery-ui/themes/base/images/', 'public/css/images/');
});