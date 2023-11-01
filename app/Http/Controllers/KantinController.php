<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kantin;

class KantinController extends Controller
{
    public function index()
    {
        $data = Kantin::latest()->paginate(10);
        $admin = User::where('role', 'admin')->get();
        return view('superadmin.kelolakantin', compact('data'));
    }
}
