#!/usr/bin/env bash

#rm -rf app/cache/test
#php app/console cache:clear -e test

if [ ! -f phpunit.xml ]; then
    cp phpunit.xml.dist phpunit.xml
fi

rm -f var/logs/**/*.log var/logs/*.log


php bin/console doctrine:schema:drop --force -e test
php bin/console doctrine:migrations:migrate --no-interaction -e test
#php app/console doctrine:fixtures:load -n -e test
#php app/console sonata:media:fix-media-context -e test
php bin/console assets:install --symlink web -e test