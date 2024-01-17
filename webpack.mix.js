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

mix.js('src/resources/assets/js/t-components.js', 'public/js')
	.js('src/resources/assets/js/t-docs.js', 'public/js')
	.sass('src/resources/assets/sass/t-components.scss', 'public/css')
	.sass('src/resources/assets/sass/tgn-site.scss', 'public/css')
	.sass('src/resources/assets/sass/tgn-form.scss', 'public/css')
	.copyDirectory('src/resources/assets/images', 'public/images')
	.copyDirectory('fonts', 'public/fonts')
	.copyDirectory('images', 'public/images');