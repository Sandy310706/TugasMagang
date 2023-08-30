<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class History_pesanan extends Model
{
    use HasFactory;

    protected $table = 'history_pesanans';

    public function Pesans():BelongsTo
    {
        return $this->belongsTo(Pesan::class);
    }
}
