#!/usr/bin/env bash

sudo chown -R www-data:www-data ./

if [[ ! -f phpunit.xml ]]; then
    cp phpunit.xml.dist phpunit.xml
fi

composer install --prefer-dist -n -o

php bin/console doctrine:database:create --if-not-exists
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console doctrine:fixtures:load -n

echo "Application is ready for work" >&2