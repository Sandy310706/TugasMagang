<?php

namespace App\Http\Controllers;
use App\Models\kelolaPesan;
use Illuminate\Http\Request;

class kelolaPesanController extends Controller
{
    protected $guarded = [];

    public function keranjang()
    {
        return $this->hasOne('App\Models\Keranjangs', 'menu_id');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'user_id');
    }
}
