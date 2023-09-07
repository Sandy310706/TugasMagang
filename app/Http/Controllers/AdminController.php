<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\History_pesanan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        return view('admin.dashboard', compact('menu'));
    }

    public function bukti()
    {
        $invoice = History_pesanan::all();
        return view('admin.invoice', compact('invoice'));
    }
}
