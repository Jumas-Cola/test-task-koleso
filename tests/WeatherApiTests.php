<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use JumasCola\TestTaskKoleso\WeatherApiService;

final class WeatherApiTests extends TestCase
{
    public function testWeatherForecast(): void
    {
        $apiKey = getenv('API_KEY');
        $apiService = new WeatherApiService($apiKey);

        $city = 'test';
        $data = $apiService->forecast($city, 2);

        $this->assertArrayHasKey('forecast', $data);
        $forecast = $data['forecast'];

        $this->assertArrayHasKey('forecastday', $forecast);
        $forecastDays = $forecast['forecastday'];

        $this->assertCount(2, $forecastDays);
        $forecastDay1 = $forecastDays[0];

        $this->assertArrayHasKey('day', $forecastDay1);
        $forecastDay1Day = $forecastDay1['day'];

        $this->assertArrayHasKey('condition', $forecastDay1Day);
        $forecastDay1DayCondition = $forecastDay1Day['condition'];

        $this->assertArrayHasKey('text', $forecastDay1DayCondition);
    }
}
