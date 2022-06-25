<?php

namespace App\Http\Controllers;

use App\Models\Forecast;
use App\Models\Weather;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $weather = Weather::orderBy('id', 'desc')->limit(1)->first();

        $forecast = Forecast::orderBy('id', 'desc')->limit(7)->get()->sortBy('dt');

        return view('welcome', [
            'weather' => $weather,
            'forecast' => $forecast
        ]);
    }
}
