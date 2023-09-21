<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\fileExists;

class MenuController extends Controller
{
    public function index()
    {
        $data = Menu::all();
        return view('user.menuPage', compact('data'));
    }


}
