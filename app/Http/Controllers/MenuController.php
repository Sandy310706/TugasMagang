<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Makanan;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function adminMenu() {
        $menu = Menu::all();
        return view('admin.menu', compact('menu'));
    }

    public function index() {
        return view('user.menuPage');
    }
}
