<?php

namespace App\Http\Controllers;

use App\Livewire\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Dirape\Token\Token;
use App\Models\Menu;
use App\Models\Invoice;
use App\Models\Keranjangs;

class InvoiceController extends Controller
{
    public function index(Request $id)
    {
        $invoices = Keranjangs::where('user_id', auth()->user()->id)->get();
        $data = Invoice::find($id);
        $detail = Invoice::all();


        return view('user.histori', compact('invoices', 'data', 'detail', ));
    }

    public function store($id)
    {
        $randomString = Str::random(3);

        $keranjang = Keranjangs::where('id',$id)->first();

        $invoice = new Invoice;
        $invoice->user_id = auth()->user()->id;
        $invoice->keranjang_id = $keranjang->id;
        $invoice->token = $randomString;
        $invoice->status = 0;
        $invoice->save();

        return redirect()->route('Keranjang');
        // return response()->json($invoice);
    }

}
