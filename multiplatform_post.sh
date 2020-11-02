#!/bin/bash

cd /var/www/html/

#cp -r ./weam/weam/app ./weam-multiplatform/app
cp -r ./weam/weam/public/css ./weam-multiplatform/public/css
cp -r ./weam/weam/public/js ./weam-multiplatform/public/js
cp -r ./weam/weam/resources ./weam-multiplatform/resources
cp -r ./weam/weam/routes ./weam-multiplatform/routes
cp -r ./weam/weam/.env ./weam-multiplatform/.env

cd ./weam-multiplatform
git add *.*
git commit -m "commit"
git push origin master

cd ..
rm -rf ./weam-multiplatform