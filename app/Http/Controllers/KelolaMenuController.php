<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\fileExists;

class KelolaMenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $id = auth()->user()->id_kantin;
        $data = Menu::where('id_kantin', $id)->get();
        return view('admin.kelolamenu', compact('data'));
    }

    public function store(Request $request)
    {
        $dataValidasi = Validator::make($request->all(), [
            'foto' => 'required|mimes:png,jpg,jpeg',
            'nama' => 'required|unique:menus',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ],
        [
            'foto.required' => 'Kolom ini wajib di isi',
            'nama.required' => 'Kolom ini wajib di isi',
            'harga.required' => 'Kolom ini wajib di isi',
            'nama.unique' => 'Nama telah di gunakan',
            'foto.mimes' => 'Format file tidak sesuai',
            'harga.numeric' => 'Wajib menggunakan angka',
            'stok.numeric' => 'Wajib menggunakan angka',
        ]);
        if($dataValidasi->fails()){
            return redirect()->back()->withErrors($dataValidasi)->withInput();
        }
        $data = new Menu;
        $data->nama = $request->nama;
        $data->harga = $request->harga;
        $data->stok = $request->stok;
        $data->kategori = $request->kategori;
        $data->id_kantin = auth()->user()->id_kantin;
            if($request->hasFile('foto')){
                $fileFoto = $request->file('foto');
                $newName = uniqid().$fileFoto->getClientOriginalName();
                $path = 'fileMenu/'.$newName;
                Storage::disk('public')->put($path, file_get_contents($fileFoto));
                $data->foto = $newName;
            }
        $data->save();
        Alert::success('Berhasil', 'Data berhasil di tambahkan');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $data = Menu::find($id);
        $test = $data->kantin;
        if(!$data){
            Alert::error('Gagal', 'Data tidak di temukan');
            return redirect()->back();
        }
        $dataValidasi = Validator::make($request->all(), [
            'nama' => 'string',
            'harga' => 'numeric',
            'stok' => 'numeric',
        ]);
        if($dataValidasi->fails()){
            return redirect()->back()->withErrors($dataValidasi)->withInput();
        }
        $data->nama = $request->nama;
        $data->harga = $request->harga;
        $data->stok = $request->stok;
        $data->kategori = $request->kategori;
        if($request->hasFile('foto')){
            $fileFoto = $request->file('foto');
                $newName = uniqid().$fileFoto->getClientOriginalName();
                $path = 'fileMenu/'.$newName;
                Storage::disk('public')->put($path, file_get_contents($fileFoto));
                $data->foto = $newName;
        }
        $data->save();
        Alert::success('Berhasil', 'Data berhasil di edit');
        return redirect()->back();
    }

    public function delete($id)
    {
        $data = Menu::where('id', $id)->first();
        $foto = $data->foto;
        $fotoPath = public_path('storage/fileMenu/'.$foto);
        if(fileExists($fotoPath)){
            if(unlink($fotoPath)){
                $data->delete();
                return response()->json('berhasil');
            } else{
                return redirect()->route('Admin.Dashboard');
            }
        }else{
            return redirect()->route('Admin.Menu');
        }
    }
}
