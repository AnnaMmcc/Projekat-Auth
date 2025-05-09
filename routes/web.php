<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $userFavourites = [];
    $user = \Illuminate\Support\Facades\Auth::user();

    if($userFavourites !== null)
    {
        $userFavourites = \App\Models\UserCities::where([
            'user_id' => $user->id
        ])->get();
    }

  return view('welcome', compact('userFavourites'));
});



Route::get("/search", [\App\Http\Controllers\ForecastController::class, 'searchCity'])->name("search.city");

Route::get("/search/{city:name}", [\App\Http\Controllers\ForecastController::class, 'searchPermalink'])->name('search.permalink');

Route::get("/city-temperature", [\App\Http\Controllers\temperatureCity::class, 'cityTemperatures' ]);

Route::get("/forecast/{city:name}", [\App\Http\Controllers\ForecastController::class, 'index']);

Route::get("/user-cities/favourite/{city}", [\App\Http\Controllers\UserCities::class, "favourite"])->name("favourite.city");

Route::get("/user-cities/unfavourite/{city}", [\App\Http\Controllers\UserCities::class, 'unfavourite'])->name("unfavourite.city");

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
