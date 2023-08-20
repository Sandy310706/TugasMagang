<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


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
Route::post('/registrasi', [AuthController::class, 'store'])->name('registrasi');
