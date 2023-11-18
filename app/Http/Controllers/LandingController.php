<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Keranjangs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index(Request $id)
    {
        $idUser = null;
        if(Auth::check()){
            $idUser = auth()->user()->nama;
        }else{
            $idUser = null;
        }
        $keranjang = Keranjangs::where('user_id', $idUser)->first();
        if($keranjang == null) {
            $angka = 0;
        }else{
            $angka = $keranjang->count();
        }

        $userNav = User::where('role','guest')
                    ->orWhere('role','superadmin')
                    ->orWhere('role', 'admin')
                    ->first();
        $makanan = Menu::where('kategori','makanan')
                        ->take(4)
                        ->get();
        $minuman = Menu::where('kategori', 'minuman')
                        ->take(4)
                        ->get();


        return view('user.landingpage',compact('makanan','minuman','angka','userNav'));
    }
}
