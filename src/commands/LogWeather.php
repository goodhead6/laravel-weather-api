<?php

namespace Goodhead\WeatherForecast\Commands;

use Illuminate\Console\Command;
use Goodhead\WeatherForecast\WeatherForecast;
use Goodhead\WeatherForecast\Model\WeatherLog;

class LogWeather extends Command{
/**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use to log current weather condition to DB';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $weatherApi = new WeatherForecast();

        $data = $weatherApi->getCurrentWeather()->getdata();

        $current = $data->current;

        $otherDetails = [
            "wind_mph" => $current->wind_mph,
            "wind_kph" => $current->wind_kph,
            "wind_degree" => $current->wind_degree,
            "pressure_mb" => $current->pressure_mb,
            "pressure_in" => $current->pressure_in,
            "precip_mm" => $current->precip_mm,
            "precip_in" => $current->precip_in,
            "humidity" => $current->humidity,
            "cloud" => $current->cloud,
        ];

        $weatherLog = WeatherLog::create([
            'temperature_celsius' => $current->temp_c,
            'temperature_farenheit' => $current->temp_f,
            'condition_details' => json_encode((array)$current->condition),
            'other_details' => json_encode($otherDetails),
            'synced_at' => $current->last_updated_epoch,
        ]);
            dd($weatherLog);
        return 0;
    }
}