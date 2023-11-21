<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonfirmasiMenu extends Model
{
    use HasFactory;
    protected $fillable = ['id_menu', 'is_konfirmasi'];
    protected $table = 'konfirmasi_menu';

    public function menu() {
        return $this->belongsTo(Menu::class, 'id_menu');
    }

}
