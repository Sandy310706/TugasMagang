<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kelola_user extends Model
{
    use HasFactory;

    protected $table = 'kelola_users';

    public function Users():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
