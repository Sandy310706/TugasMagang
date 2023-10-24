<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keranjangPivot extends Model
{
    use HasFactory;

    protected $table = 'keranjang_Pivot';

    protected $fillable = ['keranjang_id' , 'user_id' , 'total'];

    public function keranjang()
    {
        return $this->hasOne('App\Models\Keranjangs', 'keranjang_id');
    }

    public function menu()
    {
        return $this->hasOne('App\Models\Menu','menu_id');
    }
}
