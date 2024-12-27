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
Route::post('/login_post', [AuthController::class, 'login_post'])->name('login_post');

Route::get('/forgot', [AuthController::class, 'forgot']);


// Grup rute untuk admin
Route::group(['middleware' => 'admin', 'name' => 'admin'], function () {
    Route::get('/beranda', [AdminController::class, 'beranda'])->name('beranda');

});

// Grup rute untuk owner
Route::group(['middleware' => 'owner', 'name' => 'owner'], function () {
    Route::get('/beranda', [OwnerController::class, 'beranda'])->name('beranda');
});

// Grup rute untuk customer
Route::group(['middleware' => 'customer', 'name' => 'customer'], function () {
    Route::get('/beranda', [CustomerController::class, 'beranda'])->name('beranda');
});
