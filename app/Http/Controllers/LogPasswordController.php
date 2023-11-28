<?php

namespace App\Http\Controllers;

use App\Models\Keranjangs;
use App\Models\LogPassword;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLogPasswordRequest;
use App\Http\Requests\UpdateLogPasswordRequest;

class LogPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($nama)
    {
        $angka = 0;

        if(Auth::check()) {
            $user = Auth::user();
            $keranjang = Keranjangs::where('user_id', auth()->user()->id)->first();

            if($keranjang)
            {
                $angka = $keranjang->count();
            }
        }
        $userNav = auth()->user();
        $data = LogPassword::where('id_user', auth()->user()->id)->get();
        return view('user.logakun', compact('angka', 'userNav', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLogPasswordRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LogPassword $logPassword)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LogPassword $logPassword)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLogPasswordRequest $request, LogPassword $logPassword)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LogPassword $logPassword)
    {
        //
    }
}
