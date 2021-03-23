const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

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

mix.js('resources/js/app.js', 'public/js')
    .vue({version: 3})
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')],
    })
    .webpackConfig(webpack => {
        return {
            plugins: [
                new webpack.DefinePlugin({
                    __VUE_OPTIONS_API__ : true,
                    __VUE_PROD_DEVTOOLS__ : false
                })
            ],
            module: {
                rules: [
                    {
                        test: /\.tsx?$/,
                        loader: 'ts-loader',
                        options: {
                        appendTsSuffixTo: [/\.vue$/],
                        },
                        exclude: /node_modules/,
                    },
                ]
            },
            resolve: {
                extensions: ["*", ".js", ".jsx", ".vue", ".ts", ".tsx"]
            }
        }
    });


mix.disableNotifications();
