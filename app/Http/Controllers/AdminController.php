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
        $menu = Menu::all();
        $totalMenu = Menu::where('id_kantin', auth()->user()->id_kantin)->count();
        $totalPesanan = Invoice::count();
        $totalMasukan = Feedback::count();
        $chartSatuMinggu = new DataChart;
        $chartSatuMinggu->labels(['Senin', 'Selesa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']);
        $chartSatuMinggu->dataset('Data Penjualan Minggu Lalu', 'bar', [560.000, 100.000, 200.000, 400.000, 680.000])->backgroundColor('rgba(255, 207, 0, 1)');
        $chartSatuMinggu->dataset('Data Penjualan Minggu Ini', 'bar', [700.200, 200.000, 100.000, 400.000, 500.000])->backgroundColor('rgba(74, 181, 142, 1)');
        $chartSatuMinggu->barWidth(0.5);
        return view('admin.dashboard', compact('totalMenu','totalMasukan', 'totalPesanan', 'chartSatuMinggu', 'namaKantin'));
    }
    public function kelolaMenu()
    {
        return view('admin.kelolamenu');
    }
}
