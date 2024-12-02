<?php

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Http\Request;

use App\Http\Controllers\Api\V1\MajorController;
use App\Http\Controllers\Api\V1\DoctorController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/v1/majors',[MajorController::class,'index']);
Route::get('/v1/majors/{id}',[MajorController::class,'show']);
Route::get('/v1/majors/{id}/doctors',[MajorController::class,'doctors']);

Route::get('api/v1/doctors',[DoctorController::class,'index']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');
