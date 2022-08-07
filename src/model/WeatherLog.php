<?php

namespace Goodhead\WeatherForecast\Model;

use Illuminate\Database\Eloquent\Model;

class WeatherLog extends Model {

    protected $table = 'weather_log';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'temperature_celsius',
        'temperature_farenheit',
        'condition_details',
        'other_details',
        'synced_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'synced_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    
}
