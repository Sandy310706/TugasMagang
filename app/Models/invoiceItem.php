<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoiceItem extends Model
{
    use HasFactory;

    protected $fillable = ['keranjang_id','invoice_id'];

    public function keranjang()
    {
        return $this->hasMany(Keranjangs::class,'keranjang_id');
    }

    public function invoice()
    {
        return $this->belongsToMany(Invoice::class, 'invoice_id', 'id');
    }
}
