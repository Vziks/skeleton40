#!/usr/bin/env bash

if [ ! -f phpunit.xml ]; then
    cp phpunit.xml.dist phpunit.xml
fi

rm -f var/logs/**/*.log var/logs/*.log

php bin/console doctrine:schema:drop --force -e test
php bin/console doctrine:migrations:migrate --no-interaction -e test
php bin/console sonata:media:fix-media-context -e test
php bin/console assets:install --symlink web -e test