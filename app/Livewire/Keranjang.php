<?php

namespace App\Livewire;

use App\Models\keranjangPivot;
use Livewire\Component;
use App\Models\Menu;
use App\Models\Keranjangs;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class Keranjang extends Component
{
    public function render()
    {
        $keranjangs = Keranjangs::where('user_id', auth()->user()->id)->get();
        $totalHarga = [];

        foreach($keranjangs as $keranjang)
        {
            $totalHarga[] = (int)$keranjang->menu->harga * $keranjang->jumlah;
        }

        $arraySum = array_sum($totalHarga);
        return view('user.keranjang' ,  compact('keranjangs', 'arraySum'));
    }

    public function store($id)
    {

        if(!auth()){
            return redirect('login')->with('alert', 'Silahkan login terlebih dahulu!');
        }

        $cekKeranjang = Keranjangs::where('user_id', auth()->user()->id)
                            ->where('menu_id', $id)
                            ->first();
        $menu = Menu::where('id', $id)->first();

        $keranjang = Keranjangs::where('id', $id);

        if($cekKeranjang)
        {
            $keranjang = Keranjangs::find($cekKeranjang->id);
            $jumlah = $keranjang->jumlah + 1;
            $keranjang->jumlah = $jumlah;
            $total_harga = $menu->harga * $keranjang->jumlah;
            $keranjang->total_harga = $total_harga;
            $keranjang->save();
        } else {
            $keranjang = new Keranjangs;
            $keranjang->menu_id = $id;
            $keranjang->user_id = auth()->user()->id;
            $keranjang->jumlah =  1;
            $keranjang->total_harga = $menu->harga * $menu->quantity;
            $keranjang->subtotal = $keranjang->total_harga;
            $keranjang->save();
        }
        return response()->json($keranjang);
    }
    public function tambah($id, $menu_id)
    {
        $keranjang = Keranjangs::find($id);
        $menu = Menu::find($menu_id);
        $keranjang->jumlah = $keranjang->jumlah + 1;
        $keranjang->total_harga = $menu->harga * $keranjang->jumlah;
        $keranjang->save();
        return response()->json($keranjang);
    }
    public function kurang($id, $menu_id)
    {
        $keranjang = Keranjangs::find($id);
        $menu = Menu::find($menu_id);
        $keranjang->jumlah = $keranjang->jumlah - 1;
        $keranjang->total_harga = $menu->harga * $keranjang->jumlah;
        $keranjang->save();

        return response()->json($keranjang);
    }
    public function delete($id)
    {
        $keranjang = Keranjangs::where('id',$id);
        $keranjang->delete();
        return redirect('carts');
    }
}
