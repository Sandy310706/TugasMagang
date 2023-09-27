<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga',
        'kategori',
        'foto'
    ];

    public function Keranjang():HasMany
    {
        return $this -> hasMany(Keranjang::class);
    }

}
