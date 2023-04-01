# test-task-koleso

## Инструкция

Запуск осуществляется через докер. Строка ввода предлагает ввести город, в ответ возвращается строка с прогнозом на 2 дня.
``````
docker run -it --rm -v "$PWD":/usr/src/koleso -w /usr/src/koleso php:8.1-cli php index.php
> Enter a city: London
> Processed city London | Patchy rain possible - Patchy rain possible
