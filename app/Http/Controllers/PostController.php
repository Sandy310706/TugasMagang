<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

use  App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('/landingpage');
    }

    public function comment(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'saran' => 'required',
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'nama' => $request->input('nama'),
            'saran' => $request->input('saran'),

        ]);

        session::flash('success', 'Feedback telah dikirim');

        return redirect('/landingpage')->with('berhasil','Feedback Berhasil di tambahkan');
    }

}
