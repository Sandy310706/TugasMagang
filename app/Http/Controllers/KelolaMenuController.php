<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KelolaMenuController extends Controller
{
    public function index()
    {
        $data = Menu::latest()->paginate('10');
        return view('admin.kelolamenu', compact('data'));
    }
    public function store(Request $request)
    {
        $dataValidasi = Validator::make($request->all(), [
            'foto' => 'required|mimes:png,jpg,jpeg',
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
        ],
        [
            'foto.required' => 'Kolom ini wajib di isi',
            'nama.required' => 'Kolom ini wajib di isi',
            'harga.required' => 'Kolom ini wajib di isi',
            'foto.mimes' => 'Format file tidak sesuai',
            'harga.numeric' => 'Wajib menggunakan angka'
        ]);
        if($dataValidasi->fails()){
            return redirect()->back()
            ->withErrors($dataValidasi)
            ->withInput();
        }
        $data = new Menu;
        $data->nama = $request->nama;
        $data->harga = $request->harga;
        $data->kategori = $request->kategori;
            if($request->hasFile('foto')){
                $fileFoto = $request->file('foto');
                $newName = uniqid().$fileFoto->getClientOriginalName();
                $path = 'fileMenu/'.$newName;
                Storage::disk('public')->put($path, file_get_contents($fileFoto));
                $data->foto = $newName;
            }
        $data->save();
        return redirect('/admin/kelolamenu')->with('Berhasil', 'Data berhasil di input');
    }
    public function update(Request $request, $id)
    {
        $dataValidasi = Validator::make($request->all(), [
            'foto' => 'nullable|mimes:png,jpg,jpeg',
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
        ],
        [
            'foto.mimes' => 'Format file tidak sesuai',
        ]);
        if ($dataValidasi->fails()) {
            return redirect()->back()
                ->withErrors($dataValidasi)
                ->withInput();
        }
        $data = Menu::find($id);
        if (!$data) {
            return redirect()->back()->with('Gagal', 'Data tidak ditemukan');
        }
        $data->nama = $request->nama;
        $data->harga = $request->harga;
        $data->kategori = $request->kategori;
        if ($request->hasFile('foto')) {
            $fileFoto = $request->file('foto');
            $newName = uniqid() . $fileFoto->getClientOriginalName();
            $path = 'fileMenu/' . $newName;
            Storage::disk('public')->put($path, file_get_contents($fileFoto));

            if ($data->foto) {
                Storage::disk('public')->delete('fileMenu/' . $data->foto);
            }
            $data->foto = $newName;
        }
        $data->save();
        return redirect('/admin/kelolamenu')->with('Berhasil', 'Data berhasil diupdate');
    }
    public function delete($id)
    {
        $data = Menu::find($id);
        if (!$data) {
            return redirect()->back()->with('Gagal', 'Data tidak ditemukan');
        }
        if ($data->foto) {
            Storage::disk('public')->delete('fileMenu/' . $data->foto);
        }
        $data->delete();
        return redirect('/admin/kelolamenu')->with('Berhasil', 'Data berhasil dihapus');
    }
}
