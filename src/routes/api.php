<?php

use Goodhead\WeatherForecast\WeatherForecast;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'api'
], function () {
    Route::get('/weather/getCurrent/Malaysia', function () {
        $weatherApi = new WeatherForecast();

        return $weatherApi->getCurrentWeather();
        
    });
});
