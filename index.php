<?php

use JumasCola\TestTaskKoleso\WeatherApiService;

require('vendor/autoload.php');


$city = readline('Enter a city: ');

$apiKey = getenv('API_KEY');
$apiService = new WeatherApiService($apiKey);

$data = $apiService->forecast($city, 2);
$forecastDays = $data['forecast']['forecastday'];

$forecastDay1 = $forecastDays[0]['day']['condition']['text'];
$forecastDay2 = $forecastDays[1]['day']['condition']['text'];

echo "Processed city $city | $forecastDay1 - $forecastDay2\n";
