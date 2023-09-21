<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\KelolaMenuController;
use App\Http\Controllers\HistoriController;

Route::fallback(function () {
    return view('errors.404');
});
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
        return redirect()->route('Admin.Dashboard');
    }elseif(Auth::user()->role == 'operator'){
        return redirect()->url('/operator/dashboard');
    }else{
        return redirect('login');
    }
});
Route::middleware('auth')->group(function() {
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedbackindex');
    Route::post('/feedback',[FeedbackController::class, 'store'])->name('Feedback');
    // == Operator Route ==
    Route::get('/operator/dashboard', [OperatorController::class, 'index']);
    Route::get('/operator/akunsetting', [OperatorController::class, 'akunSetting'])->name('akunSetting');
    Route::get('/menu', [MenuController::class, 'index'])->name('index');
    Route::resource('KelolaAkun', AkunkelolaAjaxController::class);

    // == Admin Route ==
    Route::get('/admin/dashboard', [AdminController::class, 'Dashboard'])->name('Admin.Dashboard');
    Route::get('/admin/kelolamenu', [KelolaMenuController::class, 'index'])->name('Admin.KelolaMenu');
    Route::post('/admin/createmenu', [KelolaMenuController::class, 'store'])->name('Menu.Store');
    Route::put('/admin/updatemenu/{id}', [KelolaMenuController::class, 'update'])->name('Menu.Update');
    Route::delete('/admin/deletemenu/{id}', [KelolaMenuController::class, 'delete'])->name('Menu.Delete');
});

Route::get('/histori', [HistoriController::class, 'index']);
