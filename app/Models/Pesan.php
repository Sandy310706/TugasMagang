<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pesan extends Model
{
    use HasFactory;

    protected $table = 'pesans';

    public function Menus():BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function Keranjangs():HasMany
    {
        return  $this->hasMany(Keranjang::class,);
    }

    public function History_pesanans():HasOne
    {
        return $this->hasOne(History_pesanan::class);
    }
}
