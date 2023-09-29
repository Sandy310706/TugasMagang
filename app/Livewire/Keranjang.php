<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Menu;
use Illuminate\Http\Request;

class Keranjang extends Component
{
    public function render()
    {
        $keranjangs = Menu::with('Keranjang')->get();
        return view('livewire.keranjang' , compact('keranjangs'));
    }

    public function store(request $request)
    {
        Menu::created($request->all());

        return redirect('menu')->with('tambah', 'Pesanan berhasil di tambahkan');
    }
}
