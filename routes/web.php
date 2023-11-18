<?php

use App\Models\Keranjangs;
use App\Models\User;
use App\Models\Menu;
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
use App\Http\Controllers\LandingController;
use App\Http\Controllers\kelolaPesanController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\SuperAdminController;

// Errors
Route::fallback(function () {
    return view('errors.404');
});

// Landing Page
Route::get('/', [LandingController::class, 'index'])->name('landingPage')->middleware('web');


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
    Route::get('/admin/dashboard', [AdminController::class, 'Dashboard'])->name('Admin.Dashboard')->middleware('admin');
    Route::get('/admin/feedback', [FeedbackController::class, 'index'])->name('Admin.Feedback')->middleware('admin');
    Route::get('/admin/menu', [KelolaMenuController::class, 'index'])->name('Admin.Menu')->middleware('admin');
    Route::get('/admin/menu/ajax', [KelolaMenuController::class, 'getData'])->name('Admin.Menu.Ajax')->middleware('admin');
    Route::post('/menu/store', [KelolaMenuController::class, 'store'])->name('Menu.Store')->middleware('admin');
    Route::get('/menu/edit/{id}', [KelolaMenuController::class, 'edit'])->name('Menu.Edit')->middleware('admin');
    Route::post('/menu/{id}/update', [KelolaMenuController::class, 'update'])->name('Menu.Update')->middleware('admin');
    Route::delete('/menu/delete/{id}', [KelolaMenuController::class, 'delete'])->name('Menu.Delete')->middleware('admin');
    Route::get('/admin/invoice', [AdminController::class,'bukti'])->name('History')->middleware('admin');
    Route::get('/admin/keuangan', [KeuanganController::class, 'index'])->name('Admin.Kuangan')->middleware('admin');
    Route::get('/admin/pesanan', [PesananController::class, 'index'])->name('Admin.Pesanan')->middleware('admin');
    Route::post('/konfirmasipesaanan/{id}', [kelolaPesanController::class, 'konfirmasi'])->name('KonfirmasiPesanan')->middleware('admin');
    Route::get('/detailpesanan/{id}', [kelolaPesanController::class, 'detail'])->name('DetailPesanan')->middleware('admin');

  // Super Admin
    Route::get('/test', [KelolaakunController::class, "getData"]);
    Route::get('superadmin/dashboard', [SuperAdminController::class, 'index'])->name('Superadmin.Dashboard')->middleware('superadmin');
    Route::get('superadmin/kelolaakun', [KelolaakunController::class, 'index'])->name('Superadmin.Akun')->middleware('superadmin');
    Route::get('/superadmin/getAkun',[KelolaakunController::class, 'getData'])->name('Superadmin.getAkun')->middleware('superadmin');
    Route::post('/superadmin/addUser', [KelolaakunController::class, 'tambah'])->name('Akun.Tambah')->middleware('superadmin');
    Route::get('/user/{id}/edit', [KelolaakunController::class, 'edit'])->name('Akun.Edit')->middleware('superadmin');
    Route::post('/user/{id}/update', [KelolaakunController::class, 'update'])->name('Akun.Update')->middleware('superadmin');
    Route::delete('kelolaakun/hapus/{id}', [KelolaakunController::class, 'hapus'])->name('Akun.Hapus')->middleware('superadmin');
    Route::get('/superadmin/kelolakantin', [KantinController::class, 'index'])->name('Superadmin.Kantin')->middleware('superadmin');
    Route::post('/superadmin/create/kantin', [KantinController::class, 'store'])->name('Kantin.Create')->middleware('superadmin');
    Route::get('/superadmin/{id}/edit', [KantinController::class, 'edit'])->name('Kantin.Edit')->middleware('superadmin');
    Route::post('/superadmin/{id}/update', [KantinController::class, 'update'])->name('Kantin.Update')->middleware('superadmin');
    Route::delete('/kantin/{id}/delete', [KantinController::class, 'delete'])->name('Kantin.Delete')->middleware('superadmin');
    Route::get('/superadmin/getKantin', [KantinController::class, 'getKantin'])->name('Superadmin.getKantin')->middleware('superadmin');

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



