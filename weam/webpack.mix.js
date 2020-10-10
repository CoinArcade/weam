const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]).then(() => {
        var fs = require('fs');
        var mix_manifest_file = path.resolve(__dirname) + '/public/mix-manifest.json';
        var mix_manifest = require(mix_manifest_file);
        for(var key in mix_manifest) {
            mix_manifest[key] = '.' + mix_manifest[key];
        }
        fs.writeFile(mix_manifest_file, JSON.stringify(mix_manifest), function (err) {
            console.log(err);
        });
    });
