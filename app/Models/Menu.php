<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    protected $fillable = [
        'nama',
        'harga',
        'deskripsi'
    ];

    public function Nama_makanans():BelongsTo
    {
        return $this->belongsTo(Nama_makanan::class);
    }

    public function Nama_minumans():BelongsTo
    {
        return $this->belongsTo(Nama_minuman::class);
    }

    public function Pesans():HasMany
    {
        return $this->hasMany(Pesan::class);
    }

    public function Kelola_menus():BelongsTo
    {
        return $this->belongsTo(Kelola_menu::class);
    }
}
