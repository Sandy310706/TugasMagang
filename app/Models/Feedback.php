<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Feedback extends Model
{
    use HasFactory;

    public function Users():BelongsTo
    {
        return $this -> belongsTo(user::class);
    }

    protected $fillable = ['user_id', 'nama_id','kantin_id', 'feedback'];

    public function Kantin()
    {
        return $this -> hasMany(Kantin::class, 'kantin_id');
    }
}
