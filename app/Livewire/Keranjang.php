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
        $keranjangs = Keranjangs::where('user_id', auth()->user()->id)->get();
        return view('livewire.keranjang' , compact('keranjangs'));
    }

    public function store(request $request, $id)
    {


        $menu = Menu::find($id);

        if(!auth()->check())
        {

        return redirect('login');
        }


        $menu = Menu::find($id);
        $makanan = Menu::find($id);
        $minum  = Menu::find($id);
        $keranjang = $makanan->keranjang;
        if(!auth()){
        return redirect('login');
        }

        $keranjang = new Keranjangs;
        $keranjang->user_id = auth()->user()->id;
        $keranjang->menu_id = $menu->id;
        $keranjang->jumlah = 1;
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
