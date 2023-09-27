<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Keranjang extends Model
{
    use HasFactory;

    protected $fillabel = [
        'menu_id',
        'nama',
        'foto',
        'harga'
    ];

    public function menus():BelongsTo
    {
        return $this ->belongsTo(Menu::class);
    }

}
