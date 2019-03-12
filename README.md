# Название проекта

Skeleton4 - специальный собранный набор компонентов symfony4 для создания современных веб-приложений

## Приступая к работе

Данное приложение адаптировано к работе через Docker.
**Если вы хотите запускать приложение, используя Docker**, убедитесь в том, что у вас установлено:

1. docker >= 18.06.0
2. docker-compose >= 1.23.2

Если запуск приложения через Docker невозможен и вы хотите работать нативно, вам потребуется:

1. php      >= 7.1.3 (+iconv +imagick +bcmath +json +filter)
2. composer >= 1.6.3
3. mysql    >= 5.5

## Подготовка к установке и запуску приложения

Скопируйте файл .env в .env.local (https://symfony.com/doc/current/configuration/dot-env-changes.html)

Скопируйте файл docker-compose.override.yml.dist в docker-compose.override.yml

Этот файл позволяет вам переопредлять стандартные настройки с учетом специфики вашей хост-системы. Читайте подробнее про [docker-compose.override.yml](https://docs.docker.com/compose/extends/)

**Если вы работаете на Linux**:

Узнайте ваш user id:

```bash
$ id -u $(whoami) // Узнайте ваш user id
$ 1001 // Допустим ваш user id 1001
```

Откройте файл docker-compose.override.yml и присвойте аргументу HOST_USER_ID значение вашего user id:

```bash
$ sed -i 's/HOST_USER_ID: .*/HOST_USER_ID: 1001/g' docker-compose.override.yml
```

## Установка и запуск веб-приложения

#### Docker-way

```bash
make app-init
make app-run
```

В итоге, запущенное приложение будет доступно по адресу:

http://127.0.0.1:8080/

Вы можете изменить порт по-умолчанию, переопределив его в файле docker-compose.override.yml


#### Native

```bash
chmod +x bin/setup-init.sh
bin/setup-init.sh
php bin/console server:run
```

## Автоматические тесты

В этом приложении применяется функциональное тестирование на основе phpunit.

#### Docker-way

```bash
make phpunit-init
make phpunit-run
```

#### Native

Для подготовки приложения к тестированию выполните:

```bash
chmod +x bin/setup-test.sh
bin/setup-test.sh
```

Теперь можно запустить тесты:

```bash
vendor/bin/simple-phpunit -c phpunit.xml
```

Вы можете интегрировать запуск тестов в PhpStorm IDE, [смотрите здесь](https://www.youtube.com/watch?v=P5ivCbdMpwc)

## Развертывание (Deployment)

Для удаленного развертывания используется [Capistrano](https://capistranorb.com/)

В приложении интегрированы рецепты для развертывания на удаленные серверы, смотрите файлы:

```
./config/deploy.rb
./config/deploy/dev.rb
./config/deploy/stag.rb
./config/deploy/prod.rb
./Capfile
./Gemfile
./Gemfile.lock
```

Deployment осуществляется на уровне протокола SSH.

Если вы хотите деплоить непосредственно с локальной машины (**не рекомендуется**) вам потребуется прописать свой публичный ключ SSH на каждый из удаленных серверов, описанных в файлах:

```
./config/deploy/dev.rb
./config/deploy/stag.rb
./config/deploy/prod.rb
```

Также необходимо убедиться, что публичный ключ пользователя, на каждом из удаленных серверов, добавлен в настройки репозитория.

В большинстве случаев нет никакой необходимости выполнять деплой прямо с локальной машины, так как процесс деплоя выполняется на сервере Continuous Deployment. 

#### Gitlab-way

Для автоматического запуска процесса развертки, как правило, достаточно просто запушить изменения в соответствующую git ветку.

Для подробностей смотрите файл [.gitlab-ci.yml](./.gitlab-ci.yml), секцию "Deploy"

#### Docker-way

```bash
make deploy env=dev
```

#### Native

Для нативного выполнения удаленного развертывания вам потребуется:

1. ruby >= 2.4
2. bundler >= 1.16.1

Выполните команды:

```bash
bundle install
bundle exec cap dev deploy
```

## Разработано с помощью

* [Symfony 4](https://symfony.com/doc/current/index.html) - PHP Web Framework
* [Sonata Admin](https://sonata-project.org/bundles/admin/3-x/doc/index.html) - Admin generator
* [Sonata Media](https://sonata-project.org/bundles/media/3-x/doc/index.html) - Media manager
* [Capistrano](https://capistranorb.com/) - Deployment tool on Ruby

## Как вносить изменения в приложение

#### Схема ветвления git

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

#### Известные хосты, ветки окружения, CI+CD

| Окружение | Git branch  | Автодеплой | Хост |
|-----------|------------ |------------|------------|
| prod      | master      | да|нет     | 
| stag      | stag        | да|нет     | 
| demo1     | dev         | да|нет     |