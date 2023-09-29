<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Keranjang extends Model
{
    use HasFactory;

    protected $fillabel = ['nama_id','harga_id', 'foto_id'];

    public function menus():HasMany
    {
        return $this ->hasMany(Menu::class);
    }

}
