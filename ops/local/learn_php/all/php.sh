#!/usr/bin/env bash

path=/app/code/backend/learn_php

sleep 5 # wait mysql ready to go

cd ${path} || exit

echo 'delete laravel logs'
rm -rf ${path}/storage/logs/*.log

echo 'delete debugbar json files'
rm -rf ${path}/storage/debugbar/*.json

echo 'composer install....'
composer install

is_start_up_for_first_time=0

if [[ ! -f "${path}/.env" ]]; then
  cp ${path}/.env.local ${path}/.env
  is_start_up_for_first_time=1
fi

source ${path}/.env
if [[ -z "${APP_KEY}" ]]; then
  php ${path}/artisan key:generate
fi

if [[ ${is_start_up_for_first_time} == 1 ]]; then
  php artisan migrate:refresh --seed
else
  php artisan migrate
fi

# clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

echo 'supervisor running...'
cd / && exec /usr/bin/supervisord -c /etc/supervisor/supervisord.conf

#tail -f /dev/null
