<?php

namespace App\Http\Controllers;

use App\Models\History_pesanan;
use App\Models\Kelola_menu;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InvoiceController extends Controller
{
    public function index()
    {
        $data = History_pesanan::orderBy('nama', 'asc');
        return DataTables::of($data)->addIndexColumn()->addColumn('aksi', function($data){
            return view('ajax.button', compact('data'));
        })->make('true');
    }

    public function store(Request $request)
    {
        // $validator = $request->validate([
        //     'nama' => 'required',
        //     'jumlah pesanan'=> 'required',
        //     'total harga' =>'required',
        // ]);

        History_pesanan::create($request->all())    ;
    }

    public function History() {
        $invoice = History_pesanan::all();
        return redirect('admin.invoice', compact('Invoice'));
    }
}
