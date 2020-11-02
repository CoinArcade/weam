#!/bin/bash

cd /var/www/html

rm -rf ./weam-multiplatform

git clone https://github.com/0xARK/weam-multiplatform

#cp -r ./weam-multiplatform/app ./weam/weam/app
cp -r ./weam-multiplatform/public/css ./weam/weam/public/css
cp -r ./weam-multiplatform/public/js ./weam/weam/public/js
cp -r ./weam-multiplatform/resources ./weam/weam/resources
cp -r ./weam-multiplatform/routes ./weam/weam/routes
cp -r ./weam-multiplatform/.env ./weam/weam/.env