<?php

namespace App\Http\Controllers;

use App\Charts\DataChart;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index()
    {
        $chartSatuMinggu = new DataChart;
        $chartSatuMinggu->labels(['Senin', 'Selesa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']);
        $chartSatuMinggu->dataset('Data Penjualan Minggu Lalu', 'bar', [560.000, 100.000, 200.000, 400.000, 680.000])->backgroundColor('rgba(255, 207, 0, 1)');
        $chartSatuMinggu->dataset('Data Penjualan Minggu Ini', 'bar', [700.200, 200.000, 100.000, 400.000, 500.000])->backgroundColor('rgba(74, 181, 142, 1)');
        $chartSatuMinggu->barWidth(0.5);

        return view('admin.keuangan', compact('chartSatuMinggu'));
    }
}
