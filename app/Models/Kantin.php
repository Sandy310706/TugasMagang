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
        return $this->belongsTo(User::class, 'id_admin');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_kantin');
    }
}
