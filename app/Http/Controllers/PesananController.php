<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $data = Invoice::with(['User'])->orderBy('created_at', 'desc')->get();
        return response()->json(['data' => $data]);
    }
}
