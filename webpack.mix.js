const mix = require('laravel-mix');
const { VueLoaderPlugin } = require('vue-loader');

mix.webpackConfig({
    resolve: {
        extensions: ['.wasm', '.mjs', '.js', '.jsx', '.json', '.vue'],
    },
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader',
            },
        ],
    },
    plugins: [
        new VueLoaderPlugin(),
    ],
})
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .vue()
    .styles(['resources/css/styles.css'], 'public/css/custom.css');
