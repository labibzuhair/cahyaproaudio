<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;

// Route::get('/', function () {
//     return view('layouts/auth/login');
// });

Route::get('/', [BerandaController::class, 'index'])->name('home');

Route::get('/registration', [AuthController::class, 'registration']);
Route::post('/registration_post', [AuthController::class, 'registration_post'])->name('registration_post');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login_post', [AuthController::class, 'login_post'])->name('login_post');

Route::get('/forgot', [AuthController::class, 'forgot']);
Route::post('/forgot_post', [AuthController::class, 'forgot_post']);

Route::get('reset/{token}', [AuthController::class, 'getReset']);
Route::post('reset_post/{token}', [AuthController::class, 'postReset'])->name('reset_post');
Route::get('/logout', [AuthController::class, 'logout']);


// Grup rute untuk admin
Route::group(['middleware' => 'admin', 'name' => 'admin'], function () {
    Route::get('/admin/beranda', [BerandaController::class, 'beranda'])->name('admin/beranda');

});

// Grup rute untuk owner
Route::group(['middleware' => 'owner', 'name' => 'owner'], function () {
    Route::get('/owner/beranda', [BerandaController::class, 'beranda'])->name('owner/beranda');
});

// Grup rute untuk customer
Route::group(['middleware' => 'customer', 'name' => 'customer'], function () {
    Route::get('/customer/beranda', [BerandaController::class, 'beranda'])->name('customer/beranda');
});
