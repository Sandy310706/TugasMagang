<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Kantin;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'email',
        'notelpn',
        'password',
        'konfirmasiPassword',
        'role',
        'id_kantin'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts():BelongsTo
    {
        return $this -> belongsTo(Post::class);
    }

    public function Feedbacks():HasOne
    {
        return $this -> hasOne(Feedback::class);
    }

    public function kelolapesan()
    {
        return $this->belongsTo('App\Models\kelolaPesan','kelolapesan_id');
    }

    public function keranjang()
    {
        return $this->belongsTo('App\Models\Keranjangs','keranjang_id');
    }

    public function kantin()
    {
        return $this->belongsTo(Kantin::class, 'id_kantin');
    }

    public function menu()
    {
        return $this->belongsTo('App\Models\Menu','menu_id');
    }
    public function log()
    {
        $this->hasMany(Log::class, 'id_akun', 'id');
    }
}
