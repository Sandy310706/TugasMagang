<?php

namespace App\Http\Controllers;

use App\Models\Menu;

use App\Models\History_pesanan;

use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Dashboard()
    {
        $menu = Menu::all();
        $totalMenu = Menu::count();
        $totalAkun = User::count();
        return view('admin.dashboard', compact('totalMenu'), compact('totalAkun'));
    }
    public function kelolaMenu()
    {
        return view('admin.kelolamenu');
    }

    public function bukti()
    {
        $invoice = History_pesanan::all();
        return view('admin.invoice', compact('invoice'));
    }
}
