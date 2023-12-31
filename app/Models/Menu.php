<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Menu extends Model
{
    use HasFactory;


    protected $fillable = [
        'nama',
        'harga',
        'kategori',
        'foto'
    ];

    public function getTableName()
    {
        $Menu = $this->getTable();

        $Keranjangs=  Menu::table($Menu)->get();

        return $this->getTable();
    }

    // public function keranjang():BelongsTo
    // {
    //     return $this -> belongsTo(Keranjangs::class);
    // }

    public function keranjang()
    {
        return $this->hasMany('App\Models\Keranjangs', 'menu_id');
    }

}
