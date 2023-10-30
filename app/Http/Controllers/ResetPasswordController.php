<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function index($user)
    {
        $data = User::where('nama', $user)->first();
        return view('auth.resetPassword1', compact('data'));
    }
}
