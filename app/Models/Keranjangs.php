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

    protected $fillable = ['user_id','nama_id', 'harga_id', 'foto_id'];

    // public function Menu():HasMany
    // {
    //     return $this -> hasMany(Menu::class);
    // }
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
        return $this->belongsto('App\Models\kelolapesan', 'kelolapesa_id');
    }

}
