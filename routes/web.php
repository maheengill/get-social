<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingController;

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/events', EventController::class);
    Route::post('/booking', [BookingController::class, 'store']);

    Route::put('event/{event}/update', 'EventController@update');
});



require __DIR__.'/auth.php';
