<?php

namespace App\Livewire;

use App\Models\keranjangPivot;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Menu;
use Dirape\Token\Token;
use App\Models\Keranjangs;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

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
        $keranjangPivot = keranjangPivot::where('id', $id)->first();
        $keranjang = Keranjangs::where('id', $id);
        if($cekKeranjang)
        {
            $keranjang = Keranjangs::find($cekKeranjang->id);
            $jumlah = $keranjang->jumlah + 1;
            $keranjang->jumlah = $jumlah;
            $total_harga = $menu->harga * $keranjang->jumlah;
            $keranjang->total_harga = $total_harga;
            $subtotal = $menu->harga * $keranjang->jumlah;
            $total = $menu->harga * $keranjang->jumlah;
            $keranjangPivot->total = $total;
            // $keranjang->subtotal = keranjangPivot::sum('total');
            dd($keranjang->subtotal);
            //membuat array untuk menyimpan nilai lalu di sum
            $keranjang->save();
        } else {
            $keranjang = new Keranjangs;
            $keranjang->menu_id = $id;
            $keranjang->user_id = auth()->user()->id;
            $keranjang->jumlah =  1;
            $keranjangPivot->total = $menu->harga * $menu->quantity;
            $keranjang->total_harga = $menu->harga * $menu->quantity;
            $keranjang->subtotal = $keranjang->total_harga;
            $keranjang->save();
        }

        $array1 = ['keranjang1' => $keranjang->subtotal];
        $array2 = ['keranjang2' =>$keranjang->subtotal];
        $subtotal = 0;

        foreach ($array1 as $id => $value) {
            if(isset($array2[$id])) {
                $subtotal+= $value + $array2[$id];
            }
        }

        session(['success' => 'Menu berhasil di tambahkan ke Keranjang']);
        session(['lifetime' => 30]);


        return redirect('menu')->with('subtotal', $subtotal);
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
