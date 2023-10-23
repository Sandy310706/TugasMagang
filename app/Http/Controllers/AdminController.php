<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Invoice;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function Dashboard()
    {
        $menu = Menu::all();
        $totalMenu = Menu::count();
        $totalPesanan = Invoice::count();
        $totalMasukan = Feedback::count();
        return view('admin.dashboard', compact('totalMenu','totalMasukan', 'totalPesanan'));
    }
    public function kelolaMenu()
    {
        return view('admin.kelolamenu');
    }

    // public function bukti()
    // {
    //     $invoice = History_pesanan::all();
    //     return view('admin.invoice', compact('invoice'));
    // }
}
