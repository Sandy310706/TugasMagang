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
        $keranjang = Keranjangs::where('id',$id)->first();
        $userNav = User::where('role','guest')
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

        dd($detail);

        return view('user.histori', compact('invoices', 'detail','arraySum','angka','userNav'));

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

        dd($invoice);

        // return redirect()->route('Keranjang');
        return response()->json($invoice);
    }

}
