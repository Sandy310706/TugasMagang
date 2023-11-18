<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Kantin;
use App\Models\Keranjangs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class KantinController extends Controller
{
    public function index()
    {
        $data = Kantin::latest()->paginate(10);
        $admin = User::where('role', 'admin')->get();
        return view('superadmin.kelolakantin', compact('data'));
    }
    public function getKantin(Request $request)
    {
        if($request->ajax()) {
            $kantin = Kantin::all();
            return DataTables::of($kantin)->addIndexColumn()
            ->addColumn('action', function($row){
                return view('layouts.superadmin.button', compact('row'));
            })->rawColumns(['action'])->make(true);
        }
    }

    public function store(Request $request)
    {
        $dataValidasi = Validator::make($request->all(), [
            'namaKantin' => 'required',
            'fotoKantin' => 'required|mimes:png,jpg,jpeg'
        ]);
        if($dataValidasi->fails()){
            return response()->json(['errors' => $dataValidasi->errors()], 422);
        }
        $newData = new Kantin;
        $newData->namaKantin = $request->namaKantin;
        if($request->hasFile('fotoKantin')){
            $fileFoto = $request->file('fotoKantin');
            $newName = uniqid().$fileFoto->getClientOriginalName();
            $path = 'fotoKantin/'.$newName;
            Storage::disk('public')->put($path, file_get_contents($fileFoto));
            $newData->foto = $newName;
        }
        $newData->save();
        return response()->json(['success' => 'Data beru berhasil ditambahkan']);

    }
    public function edit($id)
    {
        $data = Kantin::find($id);
        return response()->json($data);
    }
    public function update(Request $request)
    {
        $dataValidasi = Validator::make($request->all(), [
            'fotoKantin' => 'mimes:png,jpg,jpeg'
        ]);
        if($dataValidasi->fails()){
            return response()->json(['errors' => $dataValidasi->errors()], 422);
        }
        $newData = Kantin::find($request->id_kantin);
        $newData->namaKantin = $request->namaKantinEdit;
        if($request->hasFile('fotoKantinEdit')){
            $fileFoto = $request->file('fotoKantinEdit');
            $newName = uniqid().$fileFoto->getClientOriginalName();
            $path = 'fotoKantin/'.$newName;
            Storage::disk('public')->put($path, file_get_contents($fileFoto));
            $newData->foto = $newName;
        }
        $newData->save();
        return response()->json(['success' => 'Data beru berhasil ditambahkan']);
    }

    public function show($namaKantin)
    {
        $keranjang = Keranjangs::where('user_id', auth()->user()->id)->get();
        $namaKantin = Kantin::where('namaKantin', $namaKantin)->first();
        $menu = Menu::where('id', $namaKantin['id'])->get();
        $userNav = User::where('role','guest')
                        ->orWhere('role','superadmin')
                        ->orWhere('role', 'admin')
                        ->first();
        $user = User::where('id', auth()->user()->id)->first();
        $angka = count($keranjang);
        return view('user.kantinPage', compact('menu','angka','user','userNav'));
    }
}
