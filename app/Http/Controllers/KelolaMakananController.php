<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;

class KelolaMakananController extends Controller
{
    public function index()
    {
        $data = Makanan::all();
        return view('admin.menuMakanan', compact('data'));
    }
    public function store(Request $request)
    {
        $DataValidasi = $request->validate([
            'nama' => ['required'],
            'harga' => ['required', 'numeric'],
        ]);
        Makanan::create($DataValidasi);
        return redirect()->route('Menu.Makanan')->with('berhasil', 'Menu berhasil di tambahkan');
    }
    public function delete($id)
    {
        $delete = Makanan::find($id);
        dd($delete);
        $delete->delete();
        return redirect()->back()->with('hapus', 'Menu berhasil di hapus');
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama' => 'required',
            'harga' => 'required'
       ]);
       Makanan::where('id', $id)->update($data);
       return redirect()->back()->with('editBerhasil', 'Data berhasil di edit');
    }
}
