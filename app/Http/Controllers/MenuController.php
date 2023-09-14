<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use function PHPUnit\Framework\fileExists;

class MenuController extends Controller
{
    public function index()
    {
        $data = Menu::all();
        return view('admin.menu', compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'foto' => 'required|mimes:png,jpg,jpeg|max:2048',
            'kategori' => 'required',
        ]);
        $data = new Menu;
        $data->nama = $request->nama;
        $data->harga = $request->harga;
        $data->kategori = $request->kategori;
        if ($request->hasFile('foto')) {
            $fileFoto = $request->file('foto');
            $newName = uniqid() . $fileFoto->getClientOriginalName();
            $path = $fileFoto->store('menuFile');
            $data->foto = $path;
        }
        $data->save();
        return redirect('/admin/menu');
    }
    public function delete($id)
    {
        $data = Menu::where('id', $id);
        $foto = $data->foto;
        $fotoPath = public_path('storage/img/menuFile/'.$foto);
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
