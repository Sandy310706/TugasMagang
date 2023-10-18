<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelolaPesan extends Model
{
    protected $guarded = [];

    public function keranjang()
    {
        return $this->hasOne('App\Models\Keranjangs', 'menu_id');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'user_id');
    }

    public function invoice()
    {
        return $this->hasOne('App\Models\Invoice', 'invoice_id');
    }
}
