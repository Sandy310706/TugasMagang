<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Kantin;
use App\Models\Invoice;
use App\Models\Feedback;
use App\Charts\DataChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function Dashboard()
    {
        $idKantin = auth()->user()->id_kantin;
        $namaKantin = Kantin::where('id', $idKantin)->first();
        $admin = User::where('id_kantin', $idKantin)->first();
        $menu = Menu::where('id_kantin', auth()->user()->id_kantin)->where('is_konfirmasi', 1)->get();
        $totalMenu = Menu::where('id_kantin', auth()->user()->id_kantin)->where('is_konfirmasi', 1)->count();
        $totalPesanan = Invoice::count();
        $totalMasukan = Feedback::count();
        return view('admin.dashboard', compact('totalMenu','totalMasukan', 'totalPesanan', 'admin', 'namaKantin', 'menu'));
    }
    public function kelolaMenu()
    {
        return view('admin.kelolamenu');
    }
}
