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
        return view('user.keranjang' , compact('keranjangs'));
    }

    public function store(request $request, $id)
    {
        if(!auth()){
            return redirect('login');
        }

        $cekKeranjang = Keranjangs::where('user_id', auth()->user()->id)
                            ->where('menu_id', $id)
                            ->first();
        if($cekKeranjang)
        {
            $keranjang = Keranjangs::find($cekKeranjang->id);
            $jumlah = $keranjang->jumlah + 1;
            $keranjang->jumlah = $jumlah;
            $keranjang->save();
        } else {
            $keranjang = new Keranjangs;
            $keranjang->menu_id = $id;
            $keranjang->user_id = auth()->user()->id;
            $keranjang->jumlah =  1;
            $keranjang->save();
        }


        // $menu = Menu::find($id);
        // // $dipesan = $menu->where('id', $id)->exists();

        // // if($dipesan){
        // //     $dipesan->jumlah + 1;
        // // }else{
        // //     return redirect('menu');
        // // }


        // if(!auth()){
        // return redirect('login');
        // }
        // $keranjang = new Keranjangs;
        // $keranjang->menu_id = $menu->id;
        // $keranjang->user_id = auth()->user()->id;
        // if($menu->id == $keranjang->menu_id){
        //     $keranjang->jumlah = $menu->quantity + 1;
        // }else{
        //     $keranjang->jumlah =  1;
        // }

        // // dd($keranjang);
        // $keranjang->save();


        // // if($keranjang->menu_id >= 1 &&  $keranjang->jumlah >=1 ){
        // //     $nilai = $keranjang->menu_id + $keranjang->jumlah;
        // //     $keranjang->save;
        // // }

        return redirect('menu')->with('tambah', 'Pesanan berhasil di tambahkan');
    }

    public function delete($id)
    {
        $keranjang = Keranjangs::where('id',$id);
        $keranjang->delete();
        return redirect('carts');
    }
}
