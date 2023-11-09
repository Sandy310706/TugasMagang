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
        $chartSatuMinggu->dataset('Data Penjualan dalam satu Minggu', 'bar', [700.200, 200.000, 100.000, 400.000, 500.000])->color('#0094FF')->backgroundColor('rgba(19, 149, 242, 0.55)');
        $chartSatuMinggu->barWidth(0.5);

        $chartSatuBulan = new DataChart;
        $chartSatuBulan->labels(['Minggu Pertama', 'Minggu Kedua', 'Minggu Ketiga', 'Minggu Keempat']);
        $chartSatuBulan->dataset('Data Penjualan dalam satu Bulan', 'bar', [1026.000, 5210.000, 10050.000, 4230.000])->color('#0094FF')->backgroundColor('rgba(19, 149, 242, 0.55)');
        $chartSatuBulan->barWidth(0.5);

        return view('admin.keuangan', compact('chartSatuMinggu', 'chartSatuBulan'));
    }
}
