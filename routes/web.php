<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OperatorController;
use App\Livewire\Keranjang;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\KelolaMenuController;
use App\Http\Controllers\HistoriController;

// == Errors Route ==
Route::fallback(function () {
    return view('errors.404');
});
//
Route::get('/', function () {
    return view('landingpage');
})->middleware('web');

// == Authentikasi Route ==
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/menu', [MenuController::class, 'index'])->name('index');
Route::get('/carts', [Keranjang::class, 'render'])->name('Keranjang');
Route::post('/carts', [Keranjang::class, 'store'])->name('Keranjang.store');
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

Route::middleware(['guest'])->group(function(){
    Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
    Route::post('/login', [AuthController::class, 'authtentication'])->name('login');
    Route::get('/phei', [AuthController::class, 'phei']);
    Route::get('/registrasi', [AuthController::class, 'registrasi'])->middleware('guest');
    Route::post('/registrasi', [AuthController::class, 'store'])->name('registrasi');
});


Route::middleware('auth')->group(function() {

    Route::middleware(['admin'])->group(function(){
        Route::get('/admin/dashboard', [AdminController::class, 'Dashboard'])->name('Admin.Dashboard');
        Route::get('admin/feedback', [FeedbackController::class, 'index'])->name('Admin.Feedback');
        Route::get('/admin/menu', [KelolaMenuController::class, 'index'])->name('Admin.Menu');
        Route::get('/admin/invoice', [AdminController::class,'bukti'])->name('History');
    });

    Route::middleware(['operator'])->group(function(){
        Route::get('/operator/dashboard', [OperatorController::class, 'Operator']);
        Route::get('/operator/akunsetting', [OperatorController::class, 'akunSetting'])->name('Operator.Akun');
    });

    Route::get('/feedback', [FeedbackController::class, 'index'])->name('Feedback');
    Route::post('/feedback',[FeedbackController::class, 'store'])->name('Feedback.Store');
    Route::post('/menu', [MenuController::class, 'store'])->name('Menu.Store');
    Route::delete('/menu/{id}', [MenuController::class, 'delete'])->name('Menu.Delete');
    Route::get('/carts', [Keranjang::class, 'render'])->name('Keranjang');
    Route::post('/menu', [MenuController::class, 'store'])->name('Menu.Store');
    Route::post('/carts', [Keranjang::class, 'store'])->name('Keranjang.store');
});



