<?php
use App\Models\Keranjangs;
use App\Livewire\Keranjang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\KelolaakunController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\KelolaMenuController;
use App\Http\Controllers\kelolaPesanController;
use App\Http\Controllers\TestController;

// == Errors Route ==
Route::fallback(function () {
    return view('errors.404');
});
//
Route::get('/', function () {
    $keranjang = Keranjangs::where('user_id')->get();
    $data = count($keranjang);
    return view('user.landingpage',compact('data'));
})->middleware('web');

// == Authentikasi Route ==
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/menu', [MenuController::class, 'index'])->name('index');
Route::get('/carts', [Keranjang::class, 'render'])->name('Keranjang');
Route::post('/carts/{id}', [Keranjang::class, 'store'])->name('Keranjang.store');
Route::get('/cartst/{id}/{menu_id}', [Keranjang::class, 'tambah'])->name('tambah');
Route::get('/cartsk/{id}/{menu_id}', [Keranjang::class, 'kurang'])->name('kurang');
Route::delete('/carts/{id}', [Keranjang::class, 'delete'])->name('Keranjang.Delete');
Route::get('/invoice', [InvoiceController::class, 'index'])->name('Invoice');
Route::post('/invoice/{id}',[InvoiceController::class, 'store'])->name('Invoice.store');
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
        Route::get('/admin/feedback', [FeedbackController::class, 'index'])->name('Admin.Feedback');
        Route::get('/admin/menu', [KelolaMenuController::class, 'index'])->name('Admin.Menu');
        Route::get('/admin/invoice', [AdminController::class,'bukti'])->name('History');
        Route::get('/admin/pesanan', [PesananController::class, 'index'])->name('Admin.Pesanan');
    });
    Route::middleware(['operator'])->group(function(){
    });
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('Feedback');
    Route::post('/feedback',[FeedbackController::class, 'store'])->name('Feedback.Store');
    Route::post('/menu', [MenuController::class, 'store'])->name('Menu.Store');
    Route::delete('/menu/{id}', [MenuController::class, 'delete'])->name('Menu.Delete');
    Route::get('/menu2', [TestController::class, 'index']);

});

Route::get('superadmin/kelolaakun', [KelolaakunController::class, 'index'])->name('Kelolaakun');
Route::post('superadmin/kelolaakun/tambah', [KelolaakunController::class, 'tambah'])->name('tambah');
Route::post('superadmin/kelolaakun/edit/{id}', [KelolaakunController::class, 'edit'])->name('Akun.edit');
Route::delete('kelolaakun/hapus/{id}', [KelolaakunController::class, 'hapus'])->name('Akun.Hapus');



