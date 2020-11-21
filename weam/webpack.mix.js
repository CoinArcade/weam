const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss')

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
    .scripts('resources/js/lib.js', 'public/js/lib.js')
    .sass('resources/sass/async.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('tailwind.config.js') ],
    })
    .then(() => {
        var fs = require('fs');
        var mix_manifest_file = path.resolve(__dirname) + '/public/mix-manifest.json';
        var mix_manifest = require(mix_manifest_file);
        for(var key in mix_manifest) {
            mix_manifest[key] = mix_manifest[key].replace(/\/js/, 'js')
            mix_manifest[key] = mix_manifest[key].replace(/\/css/, 'css')
        }
        fs.writeFile(mix_manifest_file, JSON.stringify(mix_manifest), function (err) {
            if (err !== null) {
                console.log("Mix manifest error : " + err);
            }
        });
    });
