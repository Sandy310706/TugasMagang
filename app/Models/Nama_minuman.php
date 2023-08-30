<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nama_minuman extends Model
{
    use HasFactory;

    protected $table = 'nama_minumanas';

    public function Menus():HasMany
    {
        return $this->hasMany(Menu::class);
    }
}
