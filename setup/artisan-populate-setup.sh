#!/bin/bash
echo "Start populate setup"
echo "Start cities"
php7.1 ../artisan maintenance:reindex_all_cities
echo "Start children"
php7.1 ../artisan maintenance:reindex_all_children
echo "Start schools"
php7.1 ../artisan maintenance:reindex_all_schools