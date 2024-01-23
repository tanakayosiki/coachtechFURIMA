<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Item extends Model
{
    use HasFactory;

    protected $fillable=['situation','category','img','name','detail','brand','amount'];

    public function user(){
        return $this->belongsTo('App\Models\User')->withTimestamps();
    }

    public function buy(){
        return $this->hasOne('App\Models\Buy');
    }

    public function nices(){
        return $this->hasMany('App\Models\Nice');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function is_liked_by_auth_user(){
    $id = Auth::id();

    $nicers = array();
    foreach($this->nices as $nice) {
    array_push($nicers, $nice->user_id);
    }

    if (in_array($id, $nicers)) {
    return true;
    } else {
    return false;
    }
    }

}