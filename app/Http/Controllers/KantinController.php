<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kantin;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class KantinController extends Controller
{
    public function index()
    {
        $data = Kantin::latest()->paginate(10);
        $admin = User::where('role', 'admin')->get();
        return view('superadmin.kelolakantin', compact('data'));
    }

    // public function store($id)
    // {
    //     $menu = Menu::find($id);

    //     return view();

    // }

    public function store(Request $request)
    {
        $dataValidasi = Validator::make($request->all(), [
            'namaKantin' => 'required'
        ]);
        if($dataValidasi->fails()){
            return back()->withErrors($dataValidasi)->withInput();
        }
        $newData = new Kantin;
        $newData->namaKantin = $request->namaKantin;
        $newData->save();
        Alert::success('Success Title', 'Success Message');
        return redirect()->back();

    }

    public function show($id)
    {
        $kantin = Kantin::find($id);
        // $url = route('user.menuPage', ['id' => $kantin]);
        return view('user.kantin', compact('kantin'));
    }
}
