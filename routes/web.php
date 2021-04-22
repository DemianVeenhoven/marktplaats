<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AdsBidsController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::redirect("/", "ads");
Route::get("ads/myAds", [AdsController::class, "myAds"])->name("ads.myAds");
Route::post("ads/sort", [AdsController::class, "sort"])->name("ads.sort");
Route::get("ads/{ad}/premium", [AdsController::class, "premium"])->name("ads.premium");
Route::put("ads/{ad}/premium_update", [AdsController::class, "premium_update"])->name("ads.premium_update");
Route::resource("ads", AdsController::class);
Route::resource("categories", CategoriesController::class);
Route::resource("ads.bids", AdsBidsController::class);
Route::resource("register", RegisteredUserController::class);
Route::resource("login", AuthenticatedSessionController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';