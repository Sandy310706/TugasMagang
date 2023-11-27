<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Keranjangs;
use App\Models\invoiceItem;

class invoiceItemController extends Controller
{
    public function store($id)
    {
        $keranjang = Keranjangs::where('user_id', auth()->user()->id)->get();
        $invoiceItem = Invoice::where('id',$id)->get();
        $invoiceItem= new invoiceItem;
        $invoiceItem->keranjang_id = $keranjang->id;
        $invoiceItem->invoice_id = $invoiceItem->id;
        return response() ->json($keranjang);
    }
}
