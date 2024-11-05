<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\DoctorController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\MajorController;

Route::get('/', [HomeController::class,"index"]);
Route::get('/majors', [MajorController::class,"index"]);
Route::get('/doctors', [DoctorController::class,"index"]);

Route::get('/contact', [ContactController::class,"index"]);
Route::post('/send-message', [ContactController::class,"sendMessage"]);

require_once ('admin.php');
