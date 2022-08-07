<?php

namespace Goodhead\WeatherForecast;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class WeatherForecast
{

    private $host;

    private $key;

    public function __construct($apiHost = null, $apiKey = null)
    {

        $this->key = $apiHost ?? config('weather.apiKey');

        $this->host = $apiKey ?? config('weather.apiHost');
    }

    public function getCurrentWeather()
    {

        $params = [
            "key" => $this->key,
            "q" => 'Malaysia',
            "aqi" => 'no',
        ];

        $host = $this->host;

        $queryParams = Arr::query($params);
        $url = "{$host}?{$queryParams}";
        $response = Http::get($url);

        return response()->json($response->json());
    }
}
