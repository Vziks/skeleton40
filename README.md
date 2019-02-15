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
Этот файл позволяет вам переопредлять стандартные настройки с учетом специфики вашей хост-системы

**Если вы работаете на Linux**:

Узнайте ваш user id:

```bash
$ id -u $(whoami) // Узнайте ваш user id
$ 1001 // Допустим ваш user id 1001
```

Откройте файл docker-compose.override.yml и присвойте аргументу HOST_USER_ID значение вашего user id:

```bash
$ sed -i 's/HOST_USER_ID\: .*/HOST_USER_ID\: 1001/g' docker-compose.override.yml
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
./bin/setup.init.sh
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

Explain how to run the automated tests for this system

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

Add additional notes about how to deploy this on a live system

## Built With

* [Dropwizard](http://www.dropwizard.io/1.0.2/docs/) - The web framework used
* [Maven](https://maven.apache.org/) - Dependency Management
* [ROME](https://rometools.github.io/rome/) - Used to generate RSS Feeds

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Billie Thompson** - *Initial work* - [PurpleBooth](https://github.com/PurpleBooth)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone whose code was used
* Inspiration
* etc