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
<<<<<<< HEAD
        $menu = Menu::find($id);

        if(!auth()->check()){
=======
        $makanan = Menu::find($id);
        $minum  = Menu::find($id);
        $keranjang = $makanan->keranjang;
      
        if(!auth()-){
>>>>>>> ab83d73de6d2aec3b8d2c74364bc53b727f5ee4f
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
