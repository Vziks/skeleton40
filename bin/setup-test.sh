#!/usr/bin/env bash

if [ ! -f phpunit.xml ]; then
    cp phpunit.xml.dist phpunit.xml
fi

php bin/console doctrine:database:drop --force -e test
php bin/console doctrine:database:create --if-not-exists -e test
php bin/console doctrine:schema:drop --force -e test
php bin/console doctrine:migrations:migrate --no-interaction -e test
php bin/console doctrine:fixtures:load -n -e test
#php app/console sonata:media:fix-media-context -e test
php bin/console assets:install --symlink web -e test