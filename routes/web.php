<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\KelolaMakananController;
use App\Http\Controllers\AkunkelolaAjaxController;
use App\Http\Controllers\KelolaakunAjaxController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\KelolaMenuController;

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
        return redirect()->route('Admin.Dashboard');
    }elseif(Auth::user()->role == 'operator'){
        return redirect()->url('/operator/dashboard');
    }else{
        return redirect('login');
    }
});

    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedbackindex');
    Route::post('/feedback',[FeedbackController::class, 'store'])->name('Feedback');

    Route::get('/menu', [MenuController::class, 'index'])->name('index');
//

Route::middleware('auth')->group(function() {

    // == Operator Route ==
    Route::get('/operator/dashboard', [OperatorController::class, 'index']);
    Route::get('/operator/akunsetting', [OperatorController::class, 'akunSetting'])->name('akunSetting');
    Route::get('/Ajax', [KelolaakunAjaxController::class, 'index'])->name('Ajaxakun.Index');
    Route::post('/Ajax', [KelolaakunAjaxController::class, 'store'])->name('Ajaxakun.Store');
    Route::get('/Ajax/{id}/Edit', [KelolaakunAjaxController::class, 'edit'])->name('Ajaxakun.Edit');
    Route::put('/Ajax/{id}', [KelolaakunAjaxController::class, 'update'])->name('Ajaxakun.Update');
    Route::delete('/Ajax/{id}', [KelolaakunAjaxController::class, 'destroy'])->name('Ajaxakun.Destroy');
    Route::resource('KelolaAkun', AkunkelolaAjaxController::class);

    // == Admin Route ==
    Route::get('/admin/dashboard', [AdminController::class, 'Dashboard'])->name('Admin.Dashboard');
    Route::get('admin/feedback', [FeedbackController::class, 'index'])->name('Admin.Feedback');
    Route::get('/admin/menu', [KelolaMenuController::class, 'index'])->name('Admin.Menu');
    Route::post('menu', [MenuController::class, 'store'])->name('Menu.Store');
    Route::delete('menu/{id}', [MenuController::class, 'delete'])->name('Menu.Delete');
    Route::get('/admin/menu/makanan', [KelolaMakananController::class, 'index'])->name('Menu.Makanan');
    Route::post('/admin/menu/makanan', [KelolaMakananController::class, 'store'])->name('Store.Makanan');
    Route::delete('/admin/menu/makanan/{id}', [KelolaMakananController::class, 'delete'])->name('Delete.Makanan');
    Route::put('/admin/menu/makanan/{id}', [KelolaMakananController::class, 'update'])->name('Update.Makanan');

});

Route::get('/menuapa', function()
{
    return view('admin.menu');
});

Route::get('/ModalCreate', function(){
    return view('components.modal-create');
});


Route::middleware('auth')->group(function(){

});


