<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [];

    public function Keranjang():HasOne
    {
        return $this -> hasOne(Keranjangs::class);
    }
}
