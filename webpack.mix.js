const mix = require('laravel-mix');
const path = require('path');

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

mix.webpackConfig({
   resolve: {
		 alias: {
			jquery: path.resolve(__dirname, 'node_modules/jquery/dist/jquery.min.js'),
			jQuery: path.resolve(__dirname, 'node_modules/jquery/dist/jquery.min.js')
		 }
	  },
	  devtool: 'inline-source-map',
	  stats: {
		 children: true
	  }
   })
   .js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/html2pdf.js', 'public/js/lib')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sourceMaps()
   .disableNotifications();