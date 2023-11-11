<?php


namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Keranjangs;
use App\Models\kelolaPesan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class kelolaPesanController extends Controller
{
    public function index()
    {
        $kelola = KelolaPesan::where('user_id', auth()->user()->id)->get();
        $data = Invoice::all();
        return response()->json([$data]);
    }

    public function store($id)
    {
        $randomString = Str::random(3);


        $keranjang = Keranjangs::find($id);

        $kelola = new kelolaPesan;
        $kelola->user_id = auth()->user()->id;
        $kelola->keranjang_id = $keranjang->id;
        $kelola->token = $randomString ;
        $kelola->save();

        return redirect('babi');
    }
    public function konfirmasi($id)
    {
        $pesanan = Invoice::find($id);
        $pesanan->status = 1;
        $pesanan->save();
        return response()->json($pesanan);
    }
    public function detail($id)
    {
        $data = Invoice::find($id);
        return response()->json($data);
    }
}
