<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Keranjangs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\fileExists;

class MenuController extends Controller
{
    public function index()
    {
        $makanan = Menu::where('kategori','makanan')->get();
        $minuman = Menu::where('kategori','minuman')->get();
        $data = Keranjangs::count();

        return view('user.menuPage', compact('makanan', 'minuman', 'data'));
    }
}

