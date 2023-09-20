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

    protected $fillable = [
        'user_id',
        'nama',
        'feedback'
    ];
}
