<?php

namespace App\Http\Controllers;

use App\Models\Keranjangs;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $id)
    {
        $keranjang = Keranjangs::all();
        $angka = count($keranjang);
        $user = User::where('role','guest')
                        ->orwhere('role','superadmin')
                        ->orwhere('role','admin')
                        ->first();
        $makanan = Menu::where('kategori','makanan')->get();
        $minuman = Menu::where('kategori', 'minuman')->get();


        return view('user.landingpage',compact('makanan','minuman','angka','user'));
    }
}
