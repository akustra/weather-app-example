<?php

namespace App\Http\Controllers;

use App\Models\Forecast;
use App\Models\Weather;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $slug = \session('slug', 'zielona-gora');

        $weather = Weather::where('slug', $slug)
        ->orderBy('id', 'desc')->limit(1)->first();

        $forecast = Forecast::where('slug', $slug)
        ->orderBy('id', 'desc')->limit(7)->get()->sortBy('dt');

        return view('welcome', [
            'slug' => $slug,
            'weather' => $weather,
            'forecast' => $forecast
        ]);
    }

    public function show(Request $request, string $slug)
    {
        \session(['slug' => $slug]);

        $weather = Weather::where('slug', $slug)
        ->orderBy('id', 'desc')->limit(1)->first();

        $forecast = Forecast::where('slug', $slug)
        ->orderBy('id', 'desc')->limit(7)->get()->sortBy('dt');

        return view('welcome', [
            'slug' => $slug,
            'weather' => $weather,
            'forecast' => $forecast
        ]);
    }
}
