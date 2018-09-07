#Sonata 

## Media Bundle request
```
sudo yum install -y php71w-bcmath
```

### [How to Use PHP's built-in Web Server](https://symfony.com/doc/current/setup/built_in_web_server.html)
Для приведения кода в нормальный вид выполнить:

```
#!bash

cd your-project/
composer install
bin/console server:start
```

### [Sonata](https://sonata-project.org/)
Почти вся семейка сонаты.

### [Nelmio Api Doc Bundle](https://github.com/nelmio/NelmioApiDocBundle)
Генерация документации к методам на основе аннотаций.

### [FOS JS Routing Bundle](https://github.com/FriendsOfSymfony/FOSJsRoutingBundle)
Позволяет использовать роутинг в JS. Нельзя хардкодить пути к методам в js.

# Админка #
Админка доступна по адресу /admin

# [PHP Coding Standards Fixer](https://cs.sensiolabs.org/)
Для приведения кода в нормальный вид выполнить:

```
#!bash

./vendor/bin/php-cs-fixer fix src --rules=@Symfony
```

