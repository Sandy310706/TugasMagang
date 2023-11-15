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
                    ->orWhere('role','superadmin')
                    ->orWhere('role', 'admin')
                    ->first();
        $makanan = Menu::where('kategori','makanan')
                        ->take(4)
                        ->get();
        $minuman = Menu::where('kategori', 'minuman')
                        ->take(4)
                        ->get();


        return view('user.landingpage',compact('makanan','minuman','angka','user'));
    }
}
