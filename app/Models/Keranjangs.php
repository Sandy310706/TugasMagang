<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Keranjangs extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_id',
        'menu_id',
        'harga_id',
        'foto_id',
        'total_harga',
        'jumlah',
        'subtotal',
        'kantin_id',
    ];

    public function User():HasOne
    {
        return $this -> hasOne(User::class);
    }

    public function Pesanan():BelongsTo
    {
        return $this -> belongsTo(Pesanan::class);
    }

    public function menu()
    {
        return $this->belongsTo('App\Models\Menu', 'menu_id');
    }

    public function kelolapesan()
    {
        return $this->belongsto('App\Models\kelolapesan', 'kelolapesan_id');
    }

    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice', 'invoice_id');
    }
    public function kantin()
    {
        return $this->belongsTo(Kantin::class, 'kantin_id');
    }

}
