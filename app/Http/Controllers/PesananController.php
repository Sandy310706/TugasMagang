<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $data = Invoice::all();
        return view('admin.kelolapesanan', compact('data'));
    }
}
