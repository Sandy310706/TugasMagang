<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        return view('
        operator.dashboard');
    }
    public function akunSetting()
    {
        $data = User::all();
        $role = [
            'Admin' => 'admin',
            'Guest' => 'guest',
            'Operator' => 'operator'
        ];
        return view('operator.kelolaakun', compact('data', 'role'));
    }
}
