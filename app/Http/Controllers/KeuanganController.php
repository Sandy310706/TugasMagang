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
        $chartSatuMinggu->dataset('Data Penjualan Minggu Lalu', 'bar', [560.000, 100.000, 200.000, 400.000, 680.000])->color('red')->backgroundColor('rgba(19, 149, 242, 0.55)');
        $chartSatuMinggu->dataset('Data Penjualan Minggu Ini', 'bar', [700.200, 200.000, 100.000, 400.000, 500.000])->color('#0094FF')->backgroundColor('rgba(19, 149, 242, 0.55)');
        $chartSatuMinggu->barWidth(0.5);

        $chartSatuBulan = new DataChart;
        $chartSatuBulan->labels(['Minggu Pertama', 'Minggu Kedua', 'Minggu Ketiga', 'Minggu Keempat']);
        $chartSatuBulan->dataset('Data Penjualan dalam satu Bulan', 'bar', [1026.000, 5210.000, 10050.000, 4230.000])->color('#0094FF')->backgroundColor('rgba(19, 149, 242, 0.55)');
        $chartSatuBulan->barWidth(0.5);

        $chartSatuTahun = new DataChart;
        $chartSatuTahun->labels(['Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']);
        $chartSatuTahun->dataset('Data Pemasukan Tahun ini', 'bar', [1,2,3,4,5,6,7,8,9,10,11,12]);
        $chartSatuTahun->barWidth(0.5);

        return view('admin.keuangan', compact('chartSatuMinggu', 'chartSatuBulan', 'chartSatuTahun'));
    }
}
