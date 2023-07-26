
let mix = require('laravel-mix');

// mix.js('src/app.js', 'dist').setPublicPath('dist');

//
// mix.combine([
//     'resources/js/app.js',
//     'resources/js/Posts/PostList.js',
// ], 'public/js/app.js', 'public/js/Posts/PostList.js\'');


mix.js('resources/js/app.js', 'public/js')
    .scripts('resources/js/Posts/PostList.js', 'public/js/Posts/PostList.js')
    .postCss('resources/css/app.css', 'public/css', [
        require("tailwindcss"),
    ]);

// mix.webpackConfig({
//     stats: {
//         children: true,
//     },
// });




// if (mix.inProduction()) {
//     mix.version();
// }
//mix.js('resources/js/postList.js', 'public/postList.js')