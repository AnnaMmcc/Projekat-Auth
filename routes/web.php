<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/city-temperature", [\App\Http\Controllers\temperatureCity::class, 'cityTemperatures' ]);

Route::get("/forecast/{city:name}", [\App\Http\Controllers\ForecastController::class, 'index']);





Route::middleware('auth')->prefix('admin')->group(function (){

   Route::get("/add-new-temperature", function () {
       return view('add-new-temperature');
   });

   Route::get("/forecasts", [\App\Http\Controllers\ForecastController::class, 'forecastUpdate']);

   Route::post("/forecasts/create", [\App\Http\Controllers\AdminForecastController::class, 'saveCreate'])->name("save.forecast.create");

   Route::view("/weather", "admin/weather_index");

   Route::post("/update", [\App\Http\Controllers\AdminWeatherController::class, 'update'])->name("update");

  Route::post("/add-in-database", [\App\Http\Controllers\temperatureCity::class, 'addInDatabase']);

  Route::get("/change-temperature", [\App\Http\Controllers\temperatureCity::class, 'changeTemperatures']);

  Route::get("/edit/temperatures/{id}", [\App\Http\Controllers\temperatureCity::class, 'edit'])->name('edit');

Route::post("/save/edit/temperatures/{id}", [\App\Http\Controllers\temperatureCity::class, 'saveEdit'])->name('saveEdit');

Route::get("/delete/temperatures/{id}", [\App\Http\Controllers\temperatureCity::class, 'delete'])->name('delete');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});



require __DIR__.'/auth.php';
