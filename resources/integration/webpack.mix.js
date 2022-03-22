const mix = require('laravel-mix');
const LiveReloadPlugin = require('webpack-livereload-plugin');
const isFront = process.env.FRONT;
const publicPath = isFront ? './assets/' : '../../app/wp-content/themes/orpea/assets/';

const destination = {
	fonts: `styles/fonts`,
	images: `styles/images`,
	js: `scripts`,
	css: `styles`,
};

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix
	.webpackConfig({
		devtool: 'source-map',
		plugins: [
			new LiveReloadPlugin(),
		],
        output: {
            chunkFilename: '[name].js',
        }
	})
	.setPublicPath(publicPath)
	.js('_src/scripts/app.js', publicPath + destination.js)
	.sass('_src/sass/styles.scss', publicPath + destination.css)
	.options({ processCssUrls: false, purifyCss: false })
	.version()
    .extract()
	.sourceMaps();

if (!isFront) {
	mix
		.copyDirectory('assets/styles/images', destination.images)
		.copyDirectory('assets/styles/fonts', destination.fonts)
		.version()
}
