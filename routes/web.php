<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetingsController;

// Rute Dasar
Route::get('/', [GreetingsController::class, 'welcome']);

// Rute dengan Parameter
Route::get('/hello/{name}/{npm}', [GreetingsController::class, 'greet']);
