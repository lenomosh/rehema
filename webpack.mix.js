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

mix.js([
    'public/bower_components/jquery/dist/jquery.min.js',
    'public/bower_components/jquery-ui/jquery-ui.min.js',
    'public/bower_components/bootstrap/dist/js/bootstrap.min.js',
    'public/bower_components/raphael/raphael.min.js',
    'public/bower_components/morris.js/morris.min.js',
    'public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
    'public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
    'public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    'public/bower_components/jquery-knob/dist/jquery.knob.min.js',
    'public/bower_components/moment/min/moment.min.js',
    'public/bower_components/bootstrap-daterangepicker/daterangepicker.js',
    'public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
    'public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
    'public/bower_components/fastclick/lib/fastclick.js',
    'public/dist/js/adminlte.min.js',
    'public/dist/js/pages/dashboard.js',
    'public/dist/js/demo.js',
    'public/bower_components/datatables.net/js/jquery.dataTables.min.js',
    'public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
    'public/bower_components/PACE/pace.min.js',

], 'public/js').styles([
    'public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css',
    'public/bower_components/bootstrap/dist/css/bootstrap.min.css',
    'public/bower_components/font-awesome/css/font-awesome.min.css',
    'public/bower_components/Ionicons/css/ionicons.min.css',
    'public/dist/css/AdminLTE.min.css',
    'public/dist/css/skins/_all-skins.min.css',
    'public/bower_components/morris.js/morris.css',
    'public/bower_components/jvectormap/jquery-jvectormap.css',
    'public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
    'public/bower_components/bootstrap-daterangepicker/daterangepicker.css',
    'public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',

], 'public/css/all.css');
