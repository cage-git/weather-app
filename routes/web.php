<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenWeatherController;

Route::get('/', function () {
    return view('welcome');
});

// Route::match(['get', 'post'],'index', [OpenWeatherController::class, 'index'])->name('index.form');

Route::get('fetched',[OpenWeatherController::class, 'showCities'])->name('fetchedData');

Route::post('fetchdata', [OpenWeatherController::class, 'fetchForm'])->name('fetch.form');

Route::get('fetchdata', [OpenWeatherController::class, 'index']);

Route::get('/index', [OpenWeatherController::class, 'index'])->name('index.get');

Route::post('/index', [OpenWeatherController::class, 'index'])->name('index.form');