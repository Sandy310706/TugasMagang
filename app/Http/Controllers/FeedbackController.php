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

    }

    public function store(Request $request)
    {
        $nama = Feedback::all();
        if(auth()->check()) {

            $validasiData = $request -> validate([
                'feedback' => 'required|string|max:500',
            ]);
            Feedback::create([
                'user_id' => auth()->user()->id,
                'nama_id'  => auth()->user()->nama,
                'feedback' => $request->input('feedback'),
            ]);
            return redirect('/')->with('success','Feedback berhasil terkirim');
        }else{
            return redirect()->route('login')->with('error','anda belum login');
        }
    }


}
