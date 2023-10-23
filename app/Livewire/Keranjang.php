<?php

namespace App\Livewire;

use App\Models\keranjangPivot;
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
        $keranjangs = Keranjangs::where('user_id', auth()->user()->id)->get();
        return view('user.keranjang' , compact('keranjangs'));
    }

    public function store(request $request, $id)
    {
        if(!auth()){
            return redirect('login');
        }

        $cekKeranjang = Keranjangs::where('user_id', auth()->user()->id)
                            ->where('menu_id', $id)
                            ->first();
        $menu = Menu::where('id', $id)->first();
        $keranjangPivot = keranjangPivot::where('id', $id);
        $keranjang = Keranjangs::where('id', $id);
        if($cekKeranjang)
        {
            $keranjang = Keranjangs::find($cekKeranjang->id);
            $jumlah = $keranjang->jumlah + 1;
            $keranjang->jumlah = $jumlah;
            $total_harga = $menu->harga * $keranjang->jumlah;
            $keranjang->total_harga = $total_harga;
            $subtotal = $menu->harga + $menu->harga;
            $keranjang->subtotal = $subtotal;
            $keranjang->save();
        } else {
            $keranjang = new Keranjangs;
            $keranjang->menu_id = $id;
            $keranjang->user_id = auth()->user()->id;
            $keranjang->jumlah =  1;
            $keranjang->total_harga = $menu->harga * $menu->quantity;
            $keranjang->subtotal = $keranjang->total_harga;
            $keranjangPivot = $menu->harga;
            $keranjang->save();
        }
        return redirect('menu')->with('tambah', 'Pesanan berhasil di tambahkan');
    }
    public function tambah($id, $menu_id)
    {
        $keranjang = Keranjangs::find($id);
        $menu = Menu::find($menu_id);
        $keranjang->jumlah = $keranjang->jumlah + 1;
        $keranjang->total_harga = $menu->harga * $keranjang->jumlah;
        $keranjang->save();
        return redirect('carts');
    }
    public function kurang($id, $menu_id)
    {
        $keranjang = Keranjangs::find($id);
        $menu = Menu::find($menu_id);
        $keranjang->jumlah = $keranjang->jumlah - 1;
        $keranjang->total_harga = $menu->harga * $keranjang->jumlah;
        $keranjang->save();
        return redirect('carts');
    }
    public function delete($id)
    {
        $keranjang = Keranjangs::where('id',$id);
        $keranjang->delete();
        return redirect('carts');
    }
}
