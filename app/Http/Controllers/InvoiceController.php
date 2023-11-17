<?php

namespace App\Http\Controllers;

use App\Livewire\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Dirape\Token\Token;
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
        $user = User::where('id', auth()->user()->id)->first();
        $keranjang = Keranjangs::where('id',$id)->first();
        $user = User::where('role','guest')
                    ->orWhere('role','superadmin')
                    ->orWhere('role', 'admin')
                    ->first();
        $angka = count($invoices);
        $totalHarga = [];
        foreach($invoices as $keranjang)
        {
            $totalHarga[] = (int)$keranjang->menu->harga * $keranjang->jumlah;
        }
        $arraySum = array_sum($totalHarga);


        return view('user.histori', compact('invoices', 'detail','arraySum','angka','user'));
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
