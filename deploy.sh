#!/usr/bin/env bash
composer install --no-interaction --prefer-dist --optimize-autoloader
echo "" | sudo -S service php7.1-fpm reload

if [ -f artisan ]
then
    php artisan migrate --force
    php artisan cache:clear
    php artisan queue:restart
    php artisan optimize
fi
