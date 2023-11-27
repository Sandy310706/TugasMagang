<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jumlahPesanan extends Model
{
    use HasFactory;

    protected $fillable = ['kantin_id','keranjang_id','jumlahPesanan'];

    public function Keranjang()
    {
        return $this->hasMany(keranjang::class, 'keranjang_id');
    }

    public function Kantin()
    {
        return $this->hasOne(Kantin::class, 'kantin_id');
    }
}
