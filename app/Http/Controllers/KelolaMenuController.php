<?php

namespace App\Http\Controllers;

use App\Models\Kantin;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $namaKantin = Kantin::where('id', $id)->first();
        $data = Menu::where('id_kantin', $id)->get();
        return view('admin.kelolamenu', compact('namaKantin', 'data'));
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
            'kategori.required' => 'Kolom ini wajib di isi.',
            'stok.required' => 'Kolom ini wajib di isi.',
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

            $newData = new Menu;
            $newData->nama = $request->nama;
            $newData->kategori = $request->kategori;
            $newData->harga = $request->harga;
            $newData->stok = $request->stok;
            $newData->per = strtolower($request->per);
            $newData->is_konfirmasi = 0;
            $newData->id_kantin = auth()->user()->id_kantin;
            if($request->hasFile('foto')){
                $fileFoto = $request->file('foto');
                $newName = uniqid().$fileFoto->getClientOriginalName();
                $path = 'fileMenu/'.$newName;
                Storage::disk('public')->put($path, file_get_contents($fileFoto));
                $newData->foto = $newName;
            }
            $newData->save();
            return response()->json(['success' => 'Data berhasil ditambahkan.']);
        }
    }
    public function edit($id)
    {
        $data = Menu::find($id);
        return response()->json($data);
    }
    public function update(Request $request, $id)
    {
        $dataValidasi = Validator::make($request->all(), [
            'nama' => 'string',
            'harga' => 'numeric',
            'stok' => 'numeric',
        ],
        [
            'nama.string' => 'Kolom wajib text.',
            'harga.numberic' => 'Kolom wajib angka',
            'stok.numberic' => 'Kolom wajib angka'
        ]);
        if($dataValidasi->fails()){
            return response()->json(['errors' => $dataValidasi->errors()], 422);
        }else{
            $data = Menu::find($id);
            $data->nama = $request->nama;
            $data->harga = $request->harga;
            $data->kategori = $request->kategori;
            $data->stok = $request->stok;
            $data->per = $request->per;
            $data->is_konfirmasi = 0;
            if ($request->hasFile('foto')) {
                $fileFoto = $request->file('foto');
                $newName = uniqid().$fileFoto->getClientOriginalName();
                $path = 'fileMenu/'.$newName;
                Storage::disk('public')->delete($data->foto);
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
