<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kantin;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedback = Feedback::latest()->paginate('10');
        return view('admin.feedback', compact('feedback',));
    }

    public function store(Request $request, $namaKantin)
    {
        $kantin = Kantin::where('id',$namaKantin)->get();
        $nama = Feedback::all();
        if(auth()->check()) {

            $validasiData = Validator::make($request->all(), [
                'feedback' => 'required|string|max:200',
            ],
            [
                'feedback.required' => 'Kolom feedback wajib di isi !',
                'feedback.max' => 'Maksimal 200 digit.'
            ]);
            if($validasiData->fails()) {
                return redirect()->back()->withErrors($validasiData)->withInput();
            }
            Feedback::create([
                'user_id' => auth()->user()->id,
                'nama_id'  => auth()->user()->nama,
                'feedback' => $request->input('feedback'),
                'kantin_id' => $kantin,
            ]);
            return redirect('/')->with('success','Feedback berhasil terkirim');
        }else{
            return redirect()->route('login')->with('error','anda belum login');
        }
    }
}
