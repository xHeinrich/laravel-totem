const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir(mix => {
  mix
    .less('app.less', 'public/css/app.css')
    .less('style.less', 'public/css/style.css')
    .webpack('app.js')
    .copy('resources/assets/fonts', 'public/fonts')
    .copy('resources/assets/img', 'public/img')
    .copy('resources/assets/less/img', 'public/img')
    .copy('public', '../../../public/vendor/totem');
    // .copy('public', '../app/public/vendor/horizon');
});
