#!/bin/bash

# others required installation

###########################################################
#                         DOCS                            #
###########################################################

# https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-ubuntu-18-04
# https://www.digitalocean.com/community/tutorials/how-to-deploy-a-laravel-application-with-nginx-on-ubuntu-16-04

###########################################################
#                   OTHERS REQUIREMENTS                   #
###########################################################

# instructions

# php and php-fpm installation :
# sudo apt install php7.4 php-fpm7.4 php7.4-mbstring php-mysql
# TODO : update php-fpm7.2 to php-fpm7.4 in /etc/nginx/sites-available/default

# mbstring install (for laravel)

# mysql installation :
# sudo apt install mysql-server
# sudo mysql_secure_installation
# TODO : create databases and grant privileges

# laravel installation :
# sudo apt install composer
# composer global require "laravel/installer"
# export PATH=$PATH:$HOME/.config/composer/vendor/bin
# laravel new weam --jet : 1 and no
# cd weam
# chmod 777 -R .
# php artisan migrate

# TODO : update webpack.mix.js with these lines :
# mix.js('resources/js/app.js', 'public/js')
#    .postCss('resources/css/app.css', 'public/css', [
#        require('postcss-import'),
#        require('tailwindcss'),
#    ]).then(() => {
#        var fs = require('fs');
#        var mix_manifest_file = path.resolve(__dirname) + '/public/mix-manifest.json';
#        var mix_manifest = require(mix_manifest_file);
#        for(var key in mix_manifest) {
#            mix_manifest[key] = '.' + mix_manifest[key];
#        }
#        fs.writeFile(mix_manifest_file, JSON.stringify(mix_manifest), function (err) {
#            console.log(err);
#        });
#    });
