<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Menu;
use App\Models\Keranjangs;
use Illuminate\Http\Request;

class Keranjang extends Component
{
    public function render()
    {
        $keranjangs = Menu::with('Keranjang')->get();
        return view('livewire.keranjang' , compact('keranjangs'));
    }

    public function store(request $request, $id)
    {
        $makanan = Menu::find($id);
        $minum = Menu::find($id);

<<<<<<< HEAD
        if(!auth()->check()){
=======
        if(!auth()){
>>>>>>> fc8d5e6854672fb487bdcf1f7e088b7319a9ca1d
        return redirect('login');
        }
        $keranjang = new Keranjangs;
        $keranjang->user_id = auth()->user()->id;
        $keranjang->menu_id = $makanan->id;
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
