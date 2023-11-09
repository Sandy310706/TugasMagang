<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'notelpn',
        'password',
        'konfirmasiPassword',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
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
        return $this->belongsTo('App\Models\Kantin', 'kantin_id');
    }
}
