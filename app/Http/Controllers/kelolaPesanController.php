<?php


namespace App\Http\Controllers;
use App\Models\kelolaPesan;
use Illuminate\Support\Str;
use Dirape\Token\Token;
use App\Models\Keranjangs;
use Illuminate\Http\Request;

class kelolaPesanController extends Controller
{
  public function index()
  {
     $kelola = KelolaPesan::where('user_id', auth()->user()->id)->get();
     return view('babikau', compact('kelola'));
  }

  public function store(Request $request, $id)
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
}
