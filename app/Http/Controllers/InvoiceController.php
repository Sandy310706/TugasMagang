<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Dirape\Token\Token;
use App\Models\Invoice;
use App\Models\Keranjangs;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Keranjangs::where('user_id', auth()->user()->id)->get();

        return view('admin.invoice', compact('invoices'));
    }

    public function store(Request $request, $id)
    {
        $randomString = Str::random(3);

        $keranjang = Keranjangs::where('id',$id)->first();

        $invoice = new Invoice;
        $invoice -> user_id = auth()->user()->id;
        $invoice->keranjang_id = $keranjang->id;
        $invoice->token = $randomString;
        $invoice->save();
        dd($invoice);
        return response()->json($invoice);
    }

}
