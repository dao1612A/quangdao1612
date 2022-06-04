const mix = require('laravel-mix');
let webpack = require('webpack');
const path = require('path');


directory_asset = 'public/assets';
mix.setPublicPath(path.normalize(directory_asset));

let build_js = [
    {
        from: 'resources/assets/js/pages/home.js',
        to: 'js/home.js'
    },
    {
        from: 'resources/assets/js/pages/user.js',
        to: 'js/app_user.js'
    },
    {
        from: 'resources/valex/js/pages/admin_dashboard.js',
        to: 'js/admin_dashboard.js'
    },

];

let build_scss = [
    {
        from: 'resources/assets/scss/pages/home/home.scss',
        to: 'css/home.css'
    },
    {
        from: 'resources/valex/scss/pages/admin_dashboard.scss',
        to: 'css/admin_dashboard.css'
    }
];

build_js.map((file) => {
    mix.js(file.from, file.to);
});

build_scss.map((file) => {
    mix.sass(file.from, file.to).minify(directory_asset + '/' + file.to).version();
});

// // ADMIN
// mix.sass('', 'public/css_admin').version();
// mix.js('', 'public/js_admin').version();


mix.options({
    processCssUrls: false
})
    .autoload({
        jquery: ['$', 'window.jQuery', 'jQuery'],
    });

// mix.disableNotifications();
mix.webpackConfig({
    plugins: [
        new webpack.ContextReplacementPlugin(/\.\/locale$/, 'empty-module', false, /js$/),
        new webpack.IgnorePlugin(/^codemirror$/),
    ],
    node: {
        fs: "empty"
    },
    module: {
        rules: [
            {
                test: /\.modernizrrc.js$/,
                use: ['modernizr-loader']
            },
            {
                test: /\.modernizrrc(\.json)?$/,
                use: ['modernizr-loader', 'json-loader']
            }
        ]
    },
    resolve: {
        alias: {
            "handlebars": "handlebars/dist/handlebars.js",
            modernizr$: path.resolve(__dirname, "resources/assets/js/.modernizrrc")
        }
    }
});
if (mix.inProduction()) {
    mix.version();
}
// mix.browserSync('123job.abc');
new webpack.LoaderOptionsPlugin({
    test: /\.s[ac]ss$/,
    options: {
        includePaths: [
            path.resolve(__dirname, './public/')
        ]
    }
});
