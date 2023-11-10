<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $data = Invoice::where('kantin_id', auth()->user()->id_kantin)->get();
        dd($data);
        return view('admin.kelolapesanan', compact('data'));
    }
}
