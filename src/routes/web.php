<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TVShowController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\AuthController;

/*
@@ -13,6 +14,4 @@
|
*/



Route::get('/', [HomeController::class, 'index']);

//Director routes
Route::get('/directors', [DirectorController::class, 'list']);
Route::get('/directors/create', [DirectorController::class, 'create']);
Route::post('/directors/put', [DirectorController::class, 'put']);
Route::get('/directors/update/{director}', [DirectorController::class, 'update']);
Route::post('/directors/patch/{director}', [DirectorController::class, 'patch']);
Route::post('/directors/delete/{director}', [DirectorController::class, 'delete']);

//Movie routes
Route::get('/movies', [MovieController::class, 'list']);
Route::get('/movies/create', [MovieController::class, 'create']);
Route::post('/movies/put', [MovieController::class, 'put']);
Route::get('/movies/update/{movie}', [MovieController::class, 'update']);
Route::post('/movies/patch/{movie}', [MovieController::class, 'patch']);
Route::post('/movies/delete/{movie}', [MovieController::class, 'delete']);

//TV_show routes
Route::get('/tv_shows', [TVShowController::class, 'list']);
Route::get('/tv_shows/create', [TVShowController::class, 'create']);
Route::post('/tv_shows/put', [TVShowController::class, 'put']);
Route::get('/tv_shows/update/{tv_show}', [TVShowController::class, 'update']);
Route::post('/tv_shows/patch/{tv_show}', [TVShowController::class, 'patch']);
Route::post('/tv_shows/delete/{tv_show}', [TVShowController::class, 'delete']);

//Genre routes
Route::get('/genres', [GenreController::class, 'list']);
Route::get('/genres/create', [GenreController::class, 'create']);
Route::get('/genres/update/{genre}', [GenreController::class, 'update']);
Route::post('/genres/delete/{genre}', [GenreController::class, 'delete']);

// Auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

