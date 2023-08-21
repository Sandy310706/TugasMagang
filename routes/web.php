<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});
Route::fallback(function () {
    return view('errors.404');
});
Route::get('/registrasi', function () {
    $genderOption = [
        'laki laki' => 'Laki-laki',
        'perempuan' =>'Perempuan'
    ];
    return view('auth.registrasi', compact('genderOption'));
});
Route::get('/login', function () {
    $genderOption = [
        'laki laki' => 'Laki-laki',
        'perempuan' =>'Perempuan'
    ];
    return view('auth.login', compact('genderOption'));
});

Route::post('/registrasi', [AuthController::class, 'store'])->name('registrasi');
Route::post('/', [AuthController::class, 'authtentication'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [UserController::class, 'index'])->middleware('auth');
