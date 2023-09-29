<?php

namespace App\Livewire;

use Livewire\Component;
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

        return redirect('menu')->with('tambah', 'Data berhasil di tambahkan');
    }
}
