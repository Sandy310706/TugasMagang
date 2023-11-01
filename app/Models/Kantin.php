<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kantin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'menu_id',
        'keuangan',
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User','user_id');
    }

    public function menu()
    {
        return $this->hasOne('App\Models\Menu','menu_id');
    }
}
