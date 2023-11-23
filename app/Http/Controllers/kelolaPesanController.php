<?php


namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Keranjangs;
use App\Models\User;
use App\Models\kelolaPesan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class kelolaPesanController extends Controller
{
    public function index()
    {
        $kelola = KelolaPesan::where('user_id', auth()->user()->id)->get();
        $data = Invoice::all();
        return response()->json([$data]);
    }
    public function getPesanan(Request $request)
    {
        if($request->ajax()) {
            return DataTables::eloquent(Invoice::with(['keranjang', 'user']))
            ->addIndexColumn()
            ->addColumn('nama', function($nama){
                return $nama->user->nama;
            })
            ->addColumn('action', function($row){
                return view('layouts.admin.buttonPesanan', compact('row'));
            })->rawColumns(['action'])->make(true);
        }
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
