<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable=['user_id','name','img','address','post_code','building'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function buys(){
        return $this->hasMany('App\Models\Buy');
    }
}
