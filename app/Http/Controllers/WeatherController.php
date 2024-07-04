<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function getWeather()
    {
        $apiKey = 'ffc33563043e1c29a1037b5d61a44743';

        $client = new Client();
        $apiUrl = 'http://api.openweathermap.org/data/2.5/weather?q=London&APPID=$apiKey';

        try {
            $response = $client->get($apiUrl);

            $data = json_decode($response->getBody(), true);

            return view('weather', ['weatherData' => $data]);
        } catch (\Exception $e) {
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }
}
