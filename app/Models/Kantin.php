<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kantin extends Model
{
    use HasFactory;
    protected $table = 'kantin';
    protected $fillable = [
<<<<<<< HEAD
        'user_id',
        'menu_id',
        'namaToko',
        'keuangan',
=======
        'admin_id'
>>>>>>> db7d308310d7b71675a24804e5284117b420a3ea
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_admin');
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
