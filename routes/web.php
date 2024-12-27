<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;

// Route::get('/', function () {
//     return view('layouts/auth/login');
// });

Route::get('/', [BerandaController::class, 'index']);

Route::get('/registration', [AuthController::class, 'registration']);
Route::post('/registration_post', [AuthController::class, 'registration_post'])->name('registration_post');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/forgot', [AuthController::class, 'forgot']);


