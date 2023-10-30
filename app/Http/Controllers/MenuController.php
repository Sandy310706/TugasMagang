<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Keranjangs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\fileExists;

class MenuController extends Controller
{
    public function index()
    {
        $makanan = Menu::where('kategori','makanan')->get();
        $minuman = Menu::where('kategori','minuman')->get();
        $kantin1 = Menu::where('toko','kantin1')->first();
        $kantin2 = Menu::where('toko','kantin2')->first();
        $data = Keranjangs::count();



        return view('user.menuPage', compact('makanan', 'minuman', 'data' , 'kantin1', 'kantin2'));

        
        return view('user.menuPage', compact('makanan', 'minuman', 'data'));

    }
    public function store(Request $request, $id)
    {
        $dataValidasi = Validator::make($request->all(), [
            'foto' => 'required|mimes:png,jpg,jpeg',
            'nama' => 'required|unique:menus',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            ''
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
        $data->toko = $request->toko;
            if($request->hasFile('foto')){
                $fileFoto = $request->file('foto');
                $newName = uniqid().$fileFoto->getClientOriginalName();
                $path = 'fileMenu/'.$newName;
                Storage::disk('public')->put($path, file_get_contents($fileFoto));
                $data->foto = $newName;
            }
        $data->save();
        return redirect()->route('Admin.Menu')->with('success', 'Data berhasil di input');
    }
    public function delete($id)
    {
        $data = Menu::where('id', $id)->first();
        $foto = $data->foto;
        $fotoPath = public_path('storage/fileMenu/'.$foto);
        if(fileExists($fotoPath)){
            if(unlink($fotoPath)){
                $data->delete();
                return redirect()->route('Admin.Menu');
            } else{
                return redirect()->route('Admin.Dashboard');
            }
        }else{
            $data->delete();
            return redirect()->route('Admin.Menu');
        }
    }
}

