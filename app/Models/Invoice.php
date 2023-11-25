<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['id','user_id','token', 'status','keranjang_id'];

    public function keranjang()
    {
        return $this->belongsTo('App\Models\Keranjangs', 'keranjang_id');
    }

    public function kelolapesan()
    {
        return $this->belongsTo('App\Models\kelolaPesan', 'kelolapesan_id');
    }
    public function menu(){
        return $this->belongsToMany(Menu::class, 'menu_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Kantin()
    {
        return $this->hasOne(Kantin::class, 'kantin_id');
    }
}
