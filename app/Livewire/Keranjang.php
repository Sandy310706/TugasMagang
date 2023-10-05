<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Menu;
use Dirape\Token\Token;
use App\Models\Keranjangs;
use Illuminate\Http\Request;

class Keranjang extends Component
{
    public function render()
    {
        $keranjangs = Keranjangs::all();
        return view('livewire.keranjang' , compact('keranjangs'));
    }

    public function store(request $request, $id)
    {
        $makanan = Menu::find($id);
        $minum  = Menu::find($id);
        $keranjang = $makanan->keranjang;

        if(!auth()){
        return redirect('login');
        }

        $keranjang = new Keranjangs;
        $keranjang->user_id = auth()->user()->id;
        $keranjang->menu_id = $makanan->id;
        $keranjang->nama_id = $makanan->nama;
        $keranjang->harga_id = $makanan->harga;
        $keranjang->foto_id = $makanan->foto;
        $keranjang->user_id = auth()->user()->id;
        $keranjang->menu_id = $minum->id;
        $keranjang->nama_id = $minum->nama;
        $keranjang->harga_id = $minum->harga;
        $keranjang->foto_id = $minum->foto;
        $keranjang->save();

        return redirect('menu')->with('tambah', 'Pesanan berhasil di tambahkan');
    }

    public function delete($id)
    {
        $keranjang = Keranjangs::where('id',$id);
        $keranjang->delete();
        return redirect('carts');
    }
}
