<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class History_pesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'pesan_id'];
    protected $fillable = ['nama','pesan_id','total_harga'];
    public function Pesan():BelongsTo
    {
        return $this -> belongsTo (pesan::class);
    }
}
