# Название проекта

Skeleton4 - специальный собранный набор компонентов symfony4 для создания современных веб-приложений

## Приступая к работе

Данное приложение адаптировано к работе через Docker.
**Если вы хотите запускать приложение, используя Docker**, убедитесь в том, что у вас установлено:

1. docker >= 18.06.0
2. docker-compose >= 1.23.2

Для нативного запуска приложения вам потребуется:

1. php      >= 7.1.3 (+iconv +imagick +bcmath +json)
2. composer >= 1.6.3
3. mysql    >= 5.7

### Подготовка к установке и запуску приложения

Скопируйте файл docker-compose.override.yml.dist в docker-compose.override.yml
Этот файл позволяет вам переопредлять стандартные настройки с учетом специфики вашей хост-системы.

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

### Установка и запуск приложения

#### Docker-way

```bash
docker-compose up -d
```

В итоге, запущенное приложение будет доступно по адресу:

http://127.0.0.1:8080/

Вы можете изменить порт по-умолчанию, переопределив его в файле docker-compose.override.yml

#### Native

```bash
chmod +x ./bin/setup-init.sh
./bin/setup-init.sh
php bin/console server:run
```

A step by step series of examples that tell you how to get a development env running

Say what the step will be

```
Give the example
```

And repeat

```
until finished
```

End with an example of getting some data out of the system or using it for a little demo

## Running the tests

В этом приложении применяется функциональное тестирование на основе phpunit.

Для подготовки приложения к тестированию выполните:

```bash
docker-compose up -d app_cli
docker-compose exec app_cli /var/www/bin/setup-test.sh
```

Теперь можно запустить тесты:

```bash
docker-compose exec app_cli /var/www/vendor/bin/simple-phpunit -c /var/www/phpunit.xml
```


### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Deployment

В приложении интегрированы рецепты для развертывания на удаленные серверы.

Используется [Capistrano](http://capistranorb.com/)

### Gitlab-way

Для автоматического запуска процесса развертки, как правило, достаточно просто запушить изменения в соответствующую git ветку.

Для подробностей смотрите файл: .gitlab-ci.yml, секцию "Deploy"


### Docker-way

```bash
docker run -it --rm \
 -v $(pwd):/var/www \
 -v ~/.ssh:/root/.ssh \
 kolyadin/ruby-rsync:alpine \
 sh -c 'cd /var/www && bundle install && bundle exec cap dev deploy'
```

### Native

Для нативного выполнения удаленного развертывания вам потребуется:

1. ruby >= 2.4
2. bundler >= 1.16.1



## Разработано с помощью

* [Symfony 4.2](https://symfony.com/doc/current/index.html) - PHP Web Framework
* [Sonata Admin](https://sonata-project.org/bundles/admin/3-x/doc/index.html) - Admin generator
* [Sonata Media](https://sonata-project.org/bundles/media/3-x/doc/index.html) - Media manager

## Как работать с приложеним




## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors





## License



## Acknowledgments

* Hat tip to anyone whose code was used
* Inspiration
* etc