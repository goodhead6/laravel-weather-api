<?php
namespace Goodhead\WeatherForecast;

use Goodhead\WeatherForecast\Commands\LogWeather;
use Illuminate\Support\ServiceProvider;
use Goodhead\WeatherForecast\WeatherForecast;

class WeatherForecastServiceProvider extends ServiceProvider {


    public function boot() {

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->loadRoutesFrom(__DIR__.'/routes/api.php');

        $this->mergeConfigFrom(
            __DIR__.'/config/weather.php', 'weather'
        );

        if ($this->app->runningInConsole()) {
            $this->commands([
                LogWeather::class
            ]);
        }
    }

    public function register() {

        $this->app->singleton( WeatherForecast::class, function() {
            return new WeatherForecast();
        });
        
    }
}