#!/usr/bin/env bash
git pull origin master
composer install --no-interaction --prefer-dist --optimize-autoloader
echo "" | sudo -S service php7.1-fpm reload

if [ -f artisan ]
then
    php artisan migrate --force
    php artisan cache:clear
    php php artisan queue:work --timeout=0
    php artisan optimize
fi