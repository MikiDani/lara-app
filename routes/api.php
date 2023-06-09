<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CountryController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get    ('/country',              [CountryController::class,'country']);
Route::get    ('/country/{id}',         [CountryController::class,'countryByID']);
Route::post   ('/country',              [CountryController::class,'countrySave']);
Route::put    ('/country/{id}',         [CountryController::class,'countryUpdate']);
Route::delete ('/country/delete/{id}',  [CountryController::class,'countryDelete']);