<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kelola_menu extends Model
{
    use HasFactory;

    protected $table = 'kelola_menus';

    public function Menus():HasOne
    {
        return $this->hasOne(Menu::class);
    }
}
