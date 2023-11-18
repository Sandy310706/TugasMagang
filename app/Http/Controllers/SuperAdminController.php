<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Charts\DataChart;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        $chartUser = new DataChart;
        $chartUser->labels(['Jan', 'Feb', 'Mar', 'Apr']);
        $chartUser->dataset('Users', 'bar', [10, 25, 40, 80])->backgroundColor('rgba(0, 149, 255, 1)');

        $data = Menu::where('is_konfirmasi', 0)->get();
        return view('superadmin.dashboard', compact('chartUser', 'data'));
    }
}
