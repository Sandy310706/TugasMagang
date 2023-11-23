<?php

namespace App\Livewire;

use App\Models\keranjangPivot;
use Livewire\Component;
use App\Models\Menu;
use App\Models\Kantin;
use App\Models\Keranjangs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Foreach_;

class Keranjang extends Component
{
    public function render(Request $id)
    {
        $check = Keranjangs::count();
        $keranjangs = Keranjangs::where('user_id', auth()->user()->id)->get();
        $keranjang = Keranjangs::where('id', $id)->first();
        $user = User::where('id', auth()->user()->id)->first();
        $userNav = User::where('role','guest')
                    ->orWhere('role','superadmin')
                    ->orWhere('role', 'admin')
                    ->first();
        $menu = Menu::where('id',$id)->first();
        $angka = count($keranjangs);
        $totalHarga = [];

        foreach($keranjangs as $keranjang)
        {
            $totalHarga[] = (int)$keranjang->menu->harga * $keranjang->jumlah;
        }
        $arraySum = array_sum($totalHarga);



        return view('user.keranjang' ,  compact('keranjangs', 'arraySum', 'keranjang','angka','user','userNav','check'));
    }

    public function store(Request $Request ,$id)
    {

        if(!auth()){
            return redirect('login')->with('alert', 'Silahkan login terlebih dahulu!');
        }

        $cekKeranjang = Keranjangs::where('user_id', auth()->user()->id)
                            ->where('menu_id', $id)
                            ->first();
        $menu = Menu::where('id', $id)->first();

        $kantin = Kantin::where('id', $id)->first();

        $keranjang = Keranjangs::where('id', $id);

        if($cekKeranjang)
        {
            $keranjang = Keranjangs::find($cekKeranjang->id);
            $jumlah = $keranjang->jumlah + 1;
            $keranjang->jumlah = $jumlah;
            $total_harga = $menu->harga * $keranjang->jumlah;
            $keranjang->total_harga = $total_harga;
            $keranjang->save();
        } else {
            $keranjang = new Keranjangs;
            $keranjang->menu_id = $id;
            $keranjang->user_id = auth()->user()->id;
            $keranjang->jumlah =  1;
            $keranjang->total_harga = $menu->harga * $menu->quantity;
            $keranjang->subtotal = $keranjang->total_harga;
            $keranjang->kantin_id = $kantin->id;
            $keranjang->save();
        }

        $Request->session()->forget('keranjangs');
        session(['success' => 'Menu berhasil di tambahkan ke Keranjang']);
        session(['lifetime' => 30]);
        // keranjang::truncate();


        return response()->json($keranjang);
    }
    public function tambah($id, $menu_id)
    {
        $keranjang = Keranjangs::find($id);
        $menu = Menu::find($menu_id);
        $keranjang->jumlah = $keranjang->jumlah + 1;
        $keranjang->total_harga = $menu->harga * $keranjang->jumlah;
        $keranjang->save();
        return response()->json($keranjang);
    }
    public function kurang($id, $menu_id)
    {
        $keranjang = Keranjangs::find($id);
        $menu = Menu::find($menu_id);
        $keranjang->jumlah = $keranjang->jumlah - 1;
        $keranjang->total_harga = $menu->harga * $keranjang->jumlah;
        $keranjang->save();

        return response()->json($keranjang);
    }
    public function delete($id)
    {
        $keranjang = Keranjangs::where('id',$id);
        $keranjang->delete();

        return redirect('carts');
    }


}
