<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\AuthController;

/*
@@ -13,6 +14,4 @@
|
*/



Route::get('/', [HomeController::class, 'index']);

Route::get('/directors', [DirectorController::class, 'list']);
Route::get('/directors/create', [DirectorController::class, 'create']);
Route::post('/directors/put', [DirectorController::class, 'put']);
Route::get('/directors/update/{director}', [DirectorController::class, 'update']);
Route::post('/directors/patch/{director}', [DirectorController::class, 'patch']);
Route::post('/directors/delete/{director}', [DirectorController::class, 'delete']);


// Auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);