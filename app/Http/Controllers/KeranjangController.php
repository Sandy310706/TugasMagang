<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjangs = Keranjang::WhereHas('menus', function($query){
            return $query->where('menu_id', 'nama', 'harga', 'foto');
        });
        return view('user.keranjang', compact('keranjangs'));

    }

}
