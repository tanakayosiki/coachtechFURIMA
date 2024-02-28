<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'email',
        'password',
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
    ];

    public function profile(){
        return $this->hasOne('App\Models\Profile');
    }

    public function buys(){
        return $this->hasMany('App\Models\Buy');
    }

    public function nices(){
        return $this->hasMany('App\Models\Nice');
    }

    public function  comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function sells(){
        return $this->hasMany('App\Models\Sell');
    }

    public function roles(){
        return $this->belongsToMany('App\Models\Role')->withTimestamps();
    }

    public function staff(){
        return $this->hasOne('App\Models\Staff');
    }

    public function shopComments(){
        return $this->hasMany('App\Models\ShopComment');
    }

    public function rooms(){
        return $this->hasMany('App\Models\Room');
    }
}
