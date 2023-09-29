<?php

namespace App\Livewire;

use Illuminate\Console\View\Components\Component;
use App\Models\Menu;

class Keranjang extends Component
{
    public function render()
    {
        $keranjangs = Menu::with('Keranjang')->get();
        return view('livewire.keranjang' , compact('keranjangs'));
    }

    public function store()
    {
        $data = [
            'nama' => request('nama'),
            'foto' => request('foto'),
            'harga' => request('harga')
        ];

        return redirect('menu')->with('tambah', 'Pesanan berhasil di tambahkan');
    }
}
