# Приступая к работе

## Схема ветвления git

**Минимальная:**

1. master -> task_1234567_extra_alias
2. master <- pr <- task_1234567_extra_alias

**Задача из task tracker + демонстрация на тестовом**

1. master -> task_1234567_extra_alias _(начало работы над задачей)_
2. dev <- pr <- task_1234567_extra_alias _(демонстрация функционала на тестовом хосте)_
3. master <- pr <- task_1234567_extra_alias _(деплой на боевой)_

**Задача из task tracker + демонстрация на тестовом + демонстрация на staging**

1. master -> task_1234567_extra_alias _(начало работы над задачей)_
2. dev <- pr <- task_1234567_extra_alias _(демонстрация функционала на тестовом хосте)_
3. stag <- pr <- task_1234567_extra_alias _(предрелизный показ)_
4. master <- pr <- stag _(деплой на боевой)_

На проекте используется Continuous Integration и Continuous Deployment

## Деплой (Deployment)

Deployment выполняется используя [Capistrano](http://capistranorb.com/)

Изучите настройки Capistrano:

app/config/deploy.rb

app/config/deploy/prod.rb

```
bundle install
bundle exec cap prod deploy
```

####Проект GitLab:

https://gitlab.cloud.isobar.ru/skeleton/skeleton4

## Известные хосты, ветки окружения, CI+CD

| Окружение | Git branch  | Автодеплой | Хост       |
|-----------|------------ |------------|------------|
| prod      | master      | да/нет     | 
| stag      | stag        | да/нет     | 
| demo1     | dev         | да/нет     | 



## Требования к запуску

**Mac OS / Windows / \*nix:**

* php >=7.1
* mysql >=5.5


## Как запускать тесты

```
./bin/phpunit -c app/ src/
```
Для работы тестов, если используется реальная База Данных, необходимо определить следующие переменные окружения:
SYMFONY__DB_TEST_USER, SYMFONY__DB_TEST_NAME, SYMFONY__DB_TEST_PASSWORD, SYMFONY__DB_TEST_PORT, SYMFONY__DB_TEST_HOST

Пример:

```
export SYMFONY__DATABASE__HOST='127.0.0.1'
export SYMFONY__DATABASE__NAME='skeleton'
export SYMFONY__DATABASE__PASSWORD='null'
export SYMFONY__DATABASE__PORT='null'
export SYMFONY__DATABASE__USER='root'
```

#Sonata 

## Media Bundle request
```
sudo yum install -y php71w-bcmath
```

### [How to Use PHP's built-in Web Server](https://symfony.com/doc/current/setup/built_in_web_server.html)
Для запуска проекта:

```
#!bash

cd your-project/
composer install
bin/console server:start --docroot=web
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

