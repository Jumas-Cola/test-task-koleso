<?php

namespace JumasCola\TestTaskKoleso;

class WeatherApiService
{
    /**
     * @var string
     */
    protected $apiKey;

    protected string $basePath = 'http://api.weatherapi.com/v1/';

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Forecast
     *
     * @param string $city Forecast for city
     * @param int $days Forecast days
     * @param bool $aqi (optional) Get air quality data
     * @param bool $alerts (optional) Get weather alert data
     *
     * @return array Forecast data
     */
    public function forecast(string $city, int $days, bool $aqi = false, bool $alerts = false): array
    {
        $aqi = $aqi ? 'yes' : 'no';
        $alerts = $alerts ? 'yes' : 'no';

        $params = [
            "key" => $this->apiKey,
            "q" => $city,
            "days" => $days,
            "aqi" => $aqi,
            "alerts" => $alerts
        ];

        $url = $this->basePath . "forecast.json?" . http_build_query($params);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result=curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }
}
