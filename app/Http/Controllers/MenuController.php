<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Keranjangs;
use App\Models\Kantin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\fileExists;
use PhpParser\Node\Stmt\Foreach_;

class MenuController extends Controller
{
    public function index(Request $id)
    {

        $menu = Menu::all()->take(4);
        $keranjang = Keranjangs::where('user_id', auth()->user()->id)->get();
        $user = User::where('id', auth()->user()->id)->first();
        $userNav = auth()->user();
        $angka = count($keranjang);
        $kantin = Kantin::all();


        return view('user.menuPage', compact('menu','kantin','angka','user','userNav'));

    }
    public function store(Request $request, $stok)
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
        $data->id_kantin = 1;
            if($request->hasFile('foto')){
                $fileFoto = $request->file('foto');
                $newName = uniqid().$fileFoto->getClientOriginalName();
                $path = 'fileMenu/'.$newName;
                Storage::disk('public')->put($path, file_get_contents($fileFoto));
                $data->foto = $newName;
            }

        $data->save();
        return redirect()->route('Admin.Menu')->with('success', 'Data berhasil di input');

        dd(auth()->user()->id_kantin);
        // $dataValidasi = Validator::make($request->all(), [
        //     'foto' => 'required|mimes:png,jpg,jpeg',
        //     'nama' => 'required|unique:menus',
        //     'kategori' => 'required',
        //     'harga' => 'required|numeric',
        //     'stok' => 'required|numeric',
        //     ''
        // ],
        // [
        //     'foto.required' => 'Kolom ini wajib di isi',
        //     'nama.required' => 'Kolom ini wajib di isi',
        //     'harga.required' => 'Kolom ini wajib di isi',
        //     'nama.unique' => 'Nama telah di gunakan',
        //     'foto.mimes' => 'Format file tidak sesuai',
        //     'harga.numeric' => 'Wajib menggunakan angka',
        //     'stok.numeric' => 'Wajib menggunakan angka',
        // ]);
        // if($dataValidasi->fails()){
        //     return redirect()->back()->withErrors($dataValidasi)->withInput();
        // }
        // $data = new Menu;
        // $data->nama = $request->nama;
        // $data->harga = $request->harga;
        // $data->stok = $request->stok;
        // $data->kategori = $request->kategori;
        // $data->id_kantin = 1;
        //     if($request->hasFile('foto')){
        //         $fileFoto = $request->file('foto');
        //         $newName = uniqid().$fileFoto->getClientOriginalName();
        //         $path = 'fileMenu/'.$newName;
        //         Storage::disk('public')->put($path, file_get_contents($fileFoto));
        //         $data->foto = $newName;
        //     }
        // $data->save();
        // return redirect()->route('Admin.Menu')->with('success', 'Data berhasil di input');

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

