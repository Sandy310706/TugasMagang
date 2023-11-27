<?php

namespace App\Http\Controllers;

use App\Livewire\Keranjang;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Dirape\Token\Token;
use App\Models\Kantin;
use App\Models\Menu;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Keranjangs;

class InvoiceController extends Controller
{
    public function index(Request $id)
    {
        $invoices = Keranjangs::where('user_id', auth()->user()->id)->get();
        $detail = Invoice::where('user_id', auth()->user()->id)->get();
        // dd($detail->toArray() );
        $keranjang = Keranjangs::where('id',$id)->first();
        $userNav = auth()->user();
        $angka = count($invoices);
        $totalHarga = [];
        foreach($invoices as $keranjang)
        {
            $totalHarga[] = (int)$keranjang->menu->harga * $keranjang->jumlah;
        }
        $arraySum = array_sum($totalHarga);


        return view('user.histori', compact('invoices', 'detail','arraySum','angka','userNav'));

    }

    public function store($id)
    {
        $randomString = Str::random(3);

        $keranjangId = Keranjangs::where('user_id', auth()->user()->id)
                            ->where('kantin_id',$id)
                            ->first();


        $keranjang = Keranjangs::where('user_id', auth()->user()->id)->first();

        $invoice = new Invoice;
        $invoice->user_id = auth()->user()->id;
        $invoice->keranjang_id = $keranjang->id;
        $invoice->kantin_id = $keranjang->kantin_id;
        $invoice->token = $randomString;
        $invoice->status = 0;
        $invoice->save();


        // keranjang::truncate();


        return response()->json($invoice);
        // return response()->json($invoice);
    }

}
