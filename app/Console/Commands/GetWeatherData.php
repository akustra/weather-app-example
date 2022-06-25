<?php

namespace App\Console\Commands;

use App\Models\Forecast;
use App\Models\Weather;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetWeatherData extends Command
{
    protected $signature = 'gwd';
    protected $description = 'Get weather data from the API';

    private string $url = "https://api.openweathermap.org/data/2.5/onecall?lon=17.0385376&exclude=minutely&appid=API_KEY&lat=51.1078852&units=metric&lang=pl";

    public function handle()
    {
        $this->info("Getting data from the API...");

        $url = \str_replace('API_KEY', env('API_KEY'), $this->url);

        $response = Http::get($url);
        $json = $response->body();

        $json = json_decode($json);

        // something is happening here
        Weather::create([
            'dt' => Carbon::createFromTimestamp($json->current->dt),

            'icon' => $json->current->weather[0]->icon,
            'description' => $json->current->weather[0]->description,

            'temp' => $json->current->temp,
            'feels_like' => $json->current->feels_like,
            'pressure' => $json->current->pressure,
            'humidity' => $json->current->humidity,
            'clouds' => $json->current->clouds,
            'wind_speed' => $json->current->wind_speed,
            'wind_deg' => $json->current->wind_deg,
        ]);

        foreach($json->daily as $daily) {
            Forecast::updateOrCreate([
                'dt' => Carbon::createFromTimestamp($daily->dt),
            ], [
                'icon' => $daily->weather[0]->icon,
                'description' => $daily->weather[0]->description,
    
                'temp_day' => $daily->temp->day,
                'temp_night' => $daily->temp->night,

                'feels_like_day' => $daily->feels_like->day,
                'feels_like_night' => $daily->feels_like->night,

                'pressure' => $daily->pressure,
                'humidity' => $daily->humidity,
                'clouds' => $daily->clouds,
                'wind_speed' => $daily->wind_speed,
                'wind_deg' => $daily->wind_deg,
            ]);
        }

        $this->info("Data saved.");
        return 0;
    }
}
