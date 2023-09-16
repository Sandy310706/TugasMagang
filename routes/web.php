<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\KelolaakunAjaxController;
use App\Http\Controllers\PostController;

// == Errors Route ==
Route::fallback(function () {
    return view('errors.404');
});
//

Route::get('/', function () {
    return view('landingpage');
})->middleware('web');

// == Authentikasi Route ==
Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'authtentication'])->name('login');
Route::get('/registrasi', [AuthController::class, 'registrasi'])->middleware('guest');
Route::post('/registrasi', [AuthController::class, 'store'])->name('registrasi');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/home', function() {
    if(Auth::user()->role == 'guest'){
        return redirect('');
    }elseif(Auth::user()->role == 'admin'){
        return redirect()->url('/admin/dashboard');
    }elseif(Auth::user()->role == 'operator'){
        return redirect()->url('/operator/dashboard');
    }else{
        return redirect('login');
    }
});
//

// == Operator Route ==
Route::get('/operator/dashboard', [OperatorController::class, 'index']);
Route::get('/operator/akunsetting', [OperatorController::class, 'akunSetting'])->name('akunSetting');
Route::get('/menu', [MenuController::class, 'index'])->name('index');
Route::get('/Ajax', [KelolaakunAjaxController::class, 'index']);
Route::post('/Ajax-Store', [KelolaakunAjaxController::class, 'store'])->name('tambahAkuns');
//

// == Admin Route ==
Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::get('/admin/menu', [MenuController::class, 'adminMenu'])->name('menuSetting');
Route::get('/admin/invoice', [AdminController::class,'bukti'])->name('History');
//
Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice');
Route::Post('/invoice-store', [InvoiceController::class, 'store'])->name('invoiceCreate');

// ==Feedback Route==
Route::get('/landingpage',[PostController::class,'index'])->name('feedback');
Route::post('/landingpage',[PostController::class,'comment'])->name('feedbacks');


