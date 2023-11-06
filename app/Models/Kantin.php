<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kantin extends Model
{
    use HasFactory;
    protected $table = 'kantin';
    protected $fillable = [
        'admin_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id_kantin');
    }
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_kantin');
    }
    public function keranjang()
    {
        return $this->hasOne(Keranjang::class, 'keranjang_id');
    }

}
