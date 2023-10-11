<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Keranjangs;
use App\Models\Test;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index() {
        $data = Test::all();
        return view('admin.kelolapesanan', compact('data'));
    }

    public function tampilanpesanan() {
        return view('admin.tambahdata');
    }

    public function tambah(Request $request) {
        $validate = $request->validate([
            'foto' => 'required',
            'namamenu' => 'required',
            'namapemesan' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
        ]);

        $data = $request->all();
        $data = Pesanan::create($request->all());
        if($request->has('foto')){
            $request->file('foto')->move('storage/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('pesanan');
    }

    public function menu($id)
    {
        $randomString = Str::random(3);

        $keranjang = Keranjangs::find($id);

        $pesanan = new Pesanan;
        $pesanan->nama_id = auth()->user()->nama;
        $pesanan->nama_menu = $keranjang->nama_id;
        $pesanan->totalharga_id = $keranjang->harga;

    }


}
