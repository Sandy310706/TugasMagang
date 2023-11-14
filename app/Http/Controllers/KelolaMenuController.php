<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\fileExists;

class KelolaMenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $id = auth()->user()->id_kantin;
        $data = Menu::where('id_kantin', $id)->latest()->get();
        return view('admin.kelolamenu', compact('data'));
    }
    public function getData(Request $request)
    {
        if($request->ajax()) {
            $id = auth()->user()->id_kantin;
            $data = Menu::where('id_kantin', $id)->latest()->get();
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
                return view('layouts.admin.button', compact('row'));
            })->rawColumns(['action'])->make(true);
        }
    }
    public function store(Request $request)
    {
        $dataValidasi = Validator::make($request->all(), [
            'foto' => 'required|mimes:png,jpg,jpeg',
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ],
        [
            'foto.required' => 'Kolom ini wajib di isi.',
            'nama.required' => 'Kolom ini wajib di isi.',
            'harga.required' => 'Kolom ini wajib di isi.',
            'foto.mimes' => 'Format file tidak sesuai.',
            'harga.numeric' => 'Wajib menggunakan angka.',
            'stok.numeric' => 'Wajib menggunakan angka.',
        ]);
        if($dataValidasi->fails()){
            return response()->json(['errors' => $dataValidasi->errors()], 422);
        }else{
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
            return response()->json(['success' => 'Berhasil menambahkan data']);
        }
    }
    public function getEditData($id)
    {
        $data = Menu::find($id);
        return response()->json(['data' => $data]);
    }
    public function update(Request $request, $id)
    {
        $data = Menu::find($id);
        if(!$data){
            Alert::error('Gagal', 'Data tidak di temukan.');
            return redirect()->back();
        }
        $dataValidasi = Validator::make($request->all(), [
            'nama' => 'string',
            'harga' => 'numeric',
            'stok' => 'numeric',
        ]);
        if($dataValidasi->fails()){
            return response()->json(['errors' => $dataValidasi->errors()], 422);
        }else{
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
            return response()->json(['success' => $data]);
        }
    }

    public function delete($id)
    {
        $data = Menu::where('id', $id)->first();
        $foto = $data->foto;
        $fotoPath = public_path('storage/fileMenu/'.$foto);
        if(fileExists($fotoPath)){
            if(unlink($fotoPath)){
                $data->delete();
                return response()->json(['success' => 'Data berhasil di hapus']);
            } else{
                return response()->json(['errors' => 'Foto gagal di hapus']);
            }
        }else{
            return response()->json(['errors' => 'Data gagal di hapus']);
        }
    }
}
