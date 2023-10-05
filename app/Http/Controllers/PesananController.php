<?php

namespace App\Http\Controllers;

use App\Models\Keranjangs;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;
use Dirape\Token\Token;
use Illuminate\Support\Facades\Redirect;

class PesananController extends Controller
{
    public function pesanan() {
        $data = Pesanan::all();
        return view('admin.pesanan', compact('data'));
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
        $Keranjang = Keranjangs::find($id);

        $pesanan = new pesanan;

    }


}