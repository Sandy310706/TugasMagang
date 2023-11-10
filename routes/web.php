<?php

use App\Models\Keranjangs;
use App\Livewire\Keranjang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\KantinController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KelolaakunController;
use App\Http\Controllers\KelolaMenuController;
use App\Http\Controllers\kelolaPesanController;
use App\Http\Controllers\HistoriController;

// Errors
Route::fallback(function () {
    return view('errors.404');
});

// Landing Page
Route::get('/', function () {
    $keranjang = Keranjangs::where('user_id')->get();
    $data = count($keranjang);
    return view('user.landingpage',compact('data'));
})->middleware('web');


Route::middleware(['guest'])->group(function(){
    // Auth
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'authtentication'])->name('login');
    Route::get('/phei', [AuthController::class, 'phei']);
    Route::get('/registrasi', [AuthController::class, 'registrasi'])->middleware('guest');
    Route::post('/registrasi', [AuthController::class, 'store'])->name('registrasi');
    Route::get('resetpassword/1', [AuthController::class, 'reset1'])->name('ResetPassword.1');
    Route::get('/home', function() {
        if(Auth::user()->role == 'guest'){
            return redirect('');
        }elseif(Auth::user()->role == 'admin'){
            return redirect()->route('Admin.Dashboard');
        }elseif(Auth::user()->role == 'superadmin'){
            return redirect()->route('Superadmin.Akun');
        }else{
            return redirect('login');
        }
    });
});
Route::middleware('auth')->group(function() {
    // Admin Kantin
    Route::get('/admin/dashboard', [AdminController::class, 'Dashboard'])->name('Admin.Dashboard');
    Route::get('/admin/feedback', [FeedbackController::class, 'index'])->name('Admin.Feedback');
    Route::get('/admin/menu', [KelolaMenuController::class, 'index'])->name('Admin.Menu');
    Route::get('/admin/menu/ajax', [KelolaMenuController::class, 'getData'])->name('Admin.Menu.Ajax');
    Route::post('/menu/store', [KelolaMenuController::class, 'store'])->name('Menu.Store');
    Route::put('/menu/edit/{id}', [KelolaMenuController::class, 'update'])->name('Menu.Edit');
    Route::delete('/menu/delete/{id}', [KelolaMenuController::class, 'delete'])->name('Menu.Delete');
    Route::get('/admin/invoice', [AdminController::class,'bukti'])->name('History');
    Route::get('/admin/keuangan', [KeuanganController::class, 'index'])->name('Admin.Kuangan');
    Route::get('/admin/pesanan', [PesananController::class, 'index'])->name('Admin.Pesanan');
    Route::post('/konfirmasipesaanan/{id}', [kelolaPesanController::class, 'konfirmasi'])->name('KonfirmasiPesanan');
    Route::get('/detailpesanan/{id}', [kelolaPesanController::class, 'detail'])->name('DetailPesanan');
   
  // Super Admin
    Route::get('superadmin/kelolaakun', [KelolaakunController::class, 'index'])->name('Superadmin.Akun');
    Route::post('superadmin/kelolaakun/tambah', [KelolaakunController::class, 'tambah'])->name('Akun.Tambah');
    Route::post('superadmin/kelolaakun/edit/{id}', [KelolaakunController::class, 'edit'])->name('Akun.edit');
    Route::delete('kelolaakun/hapus/{id}', [KelolaakunController::class, 'hapus'])->name('Akun.Hapus');
    Route::get('/superadmin/kelolakantin', [KantinController::class, 'index'])->name('Superadmin.Kantin');

    // Auth
    Route::get('/logout/{nama}', [AuthController::class, 'logout'])->name('Logout');

    Route::get('/menu', [MenuController::class, 'index'])->name('index');
    Route::post('/carts/{id}', [Keranjang::class, 'store'])->name('Keranjang.store');
    Route::get('/cartst/{id}/{menu_id}', [Keranjang::class, 'tambah'])->name('tambah');
    Route::get('/cartsk/{id}/{menu_id}', [Keranjang::class, 'kurang'])->name('kurang');
    Route::delete('/carts/{id}', [Keranjang::class, 'delete'])->name('Keranjang.Delete');
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('Invoice');
    Route::post('/invoice/{id}',[InvoiceController::class, 'store'])->name('Invoice.store');
    Route::get('/carts', [Keranjang::class, 'render'])->name('Keranjang');
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('Feedback');
    Route::post('/feedback',[FeedbackController::class, 'store'])->name('Feedback.Store');

    Route::post('/menu', [MenuController::class, 'store']);
    Route::delete('/menu/delete/{id}', [MenuController::class, 'delete'])->name('Menu.Delete');
    Route::post('/kantin/create', [KantinController::class, 'store'])->name('Kantin.Create');

    Route::delete('/histori', [HistoriController::class, 'index']);
    Route::get('/kantin/{namaKantin}', [KantinController::class, 'show'])->name('Kantin.view');
});



