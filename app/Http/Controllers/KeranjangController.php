<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Keranjang;

class KeranjangController extends Controller
{
    public function index()
    {
        return view('user.keranjang');
    }
}
