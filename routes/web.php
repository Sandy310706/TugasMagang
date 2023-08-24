<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\KelolaakunAjaxController;

Route::fallback(function () {
    return view('errors.404');
});
Route::get('/', function () {
    return view('landingpage');
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
})->middleware('guest');

Route::post('/registrasi', [AuthController::class, 'store'])->name('registrasi');
Route::post('/', [AuthController::class, 'authtentication'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/home', function() {
    if(Auth::user()->role == 'guest'){
        return redirect('dashboard');
    }elseif(Auth::user()->role == 'admin'){
        return redirect('dashboard');
    }elseif(Auth::user()->role == 'operator'){
        return redirect('dashboard');
    }else{
        return redirect('login');
    }
});

Route::get('/dashboard', [UserController::class, 'index'])->middleware('auth');
Route::get('/operator/dashboard', [OperatorController::class, 'index']);
Route::get('/operator/akunsetting', [OperatorController::class, 'akunSetting'])->name('akunSetting');
Route::get('/menu', [MenuController::class, 'index'])->name('index');

Route::get('/Ajax', [KelolaakunAjaxController::class, 'index']);
Route::post('/Ajax-Store', [KelolaakunAjaxController::class, 'store'])->name('tambahAkuns');

Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::get('/admin/menu', [MenuController::class, 'adminMenu'])->name('menuSetting');

