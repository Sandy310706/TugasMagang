<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->check()) {
            return view('landingpage');
        }else{
            return redirect()->route('login')->with('error','anda belum login');
        }
    }

    public function store(Request $request)
    {
        $validasiData = $request -> validate([

            'nama'  => 'required|string|max:250',
            'feedback' => 'required|string|max:500',
        ]);

       $p =  Feedback::create([
            'user_id' => auth()->user()->id,
            'nama' => $request ->input('nama'),
            'feedback' => $request->input('feedback'),
        ]);

        dd($p);

        return redirect('')->route('/feedback')->with('success','Feedback berhasil terkirim');
    }


}
