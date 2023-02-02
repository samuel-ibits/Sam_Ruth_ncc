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

mix
    /* CSS */
    .sass('resources/sass/main.scss', 'public/css/codebase.css')
    .sass('resources/sass/codebase/themes/corporate.scss', 'public/css/themes/')
    .sass('resources/sass/codebase/themes/earth.scss', 'public/css/themes/')
    .sass('resources/sass/codebase/themes/elegance.scss', 'public/css/themes/')
    .sass('resources/sass/codebase/themes/flat.scss', 'public/css/themes/')
    .sass('resources/sass/codebase/themes/pulse.scss', 'public/css/themes/')

    /* JS */
    .js('resources/js/app.js', 'public/js/laravel.app.js')
    .js('resources/js/codebase/app.js', 'public/js/codebase.app.js')

    /* Page JS */
    .js('resources/js/pages/tables_datatables.js', 'public/js/pages/tables_datatables.js')
    .js('resources/js/pages/be_forms_plugins.js', 'public/js/pages/be_forms_plugins.js')
    .js('resources/js/pages/be_forms_validation.js', 'public/js/pages/be_forms_validation.js')
    .js('resources/js/pages/be_forms_wizard.js', 'public/js/pages/be_forms_wizard.js')
    .js('resources/js/pages/be_pages_dashboard.js', 'public/js/pages/be_pages_dashboard.js')
    .js('resources/js/pages/create_tower.js', 'public/js/pages/create_tower.js')
    .js('resources/js/pages/edit_tower.js', 'public/js/pages/edit_tower.js')

    /* Tools */
    .browserSync('localhost:8000')
    .disableNotifications()

    /* Options */
    .options({
        processCssUrls: false
    });
