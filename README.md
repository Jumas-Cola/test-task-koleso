# test-task-koleso

## Инструкция

Запуск осуществляется через докер. Строка ввода предлагает ввести город, в ответ возвращается строка с прогнозом на 2 дня.

```
# Установка зависимостей
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs

# Запуск тестов
docker run -it --rm -v "$PWD":/usr/src/koleso \
                    -w /usr/src/koleso \
                    -e API_KEY='4a0804a75b9b49d8bbb135402230204' php:8.1-cli vendor/bin/phpunit tests/*

# Запуск приложения
docker run -it --rm -v "$PWD":/usr/src/koleso \
                    -w /usr/src/koleso \
                    -e API_KEY='4a0804a75b9b49d8bbb135402230204' php:8.1-cli php index.php
> Enter a city: London
> Processed city London | Patchy rain possible - Patchy rain possible
```

## Шаг 2

- POST /weather
  Данные json:

```
{
    'city_id': int,
    'date': string,
    'weather': string
}
```

Описание:
> city_id - идентификатор города, для которого сохраняются данные о погоде  
> date - дата, погода для которой сохраняется  
> weather - погода  


- GET /weather?city={city_id}&date={date}  

Описание:
> city_id - идентификатор города, для которого будут получены данные о погоде  
> date - дата в формате 2023-04-02, для которой будут получены данные о погоде
