<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectorController;

/*
@@ -13,6 +14,4 @@
|
*/



Route::get('/', [HomeController::class, 'index']);

Route::get('/directors', [DirectorController::class, 'list']);
