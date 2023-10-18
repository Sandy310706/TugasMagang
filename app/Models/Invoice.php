<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','nama_menu', 'harga', 'total_harga' ,'jumlah'];

    public function keranjang()
    {
        return $this->hasOne('App\Models\Keranjangs', 'keranjang_id');
    }

    public function kelolapesan()
    {
        return $this->belongsTo('App\Models\kelolaPesan', 'kelolapesan_id');
    }
}
