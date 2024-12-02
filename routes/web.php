<?php

use App\Http\Controllers\Front\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\DoctorController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\MajorController;

Route::get('/', [HomeController::class,"index"])->name('home');
// Route::get('/majors', [MajorController::class,"index"])->can('viewAll','job');
Route::get('/majors', [MajorController::class,"index"]);
Route::get('/majors/{major}/doctors', [MajorController::class,"doctors"]);
Route::get('/doctors', [DoctorController::class,"index"]);

Route::middleware('auth')->group(function(){
    Route::get('/appointments/{user}', [AppointmentController::class,"create"])->name('appointments.create');
    Route::post('/appointments/{user}', [AppointmentController::class,"store"])->name('appointments.store');
});






Route::get('/contact', [ContactController::class,"index"])->can('make-appointment');
Route::post('/send-message', [ContactController::class,"sendMessage"]);

require_once ('admin.php');
require_once (__DIR__.'/auth.php');
require_once (__DIR__.'/api-old.php');
