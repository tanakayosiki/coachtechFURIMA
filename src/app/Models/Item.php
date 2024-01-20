<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Item extends Model
{
    use HasFactory;

    protected $fillable=['situation','category','img','name','detail','brand','amount'];

    public function users(){
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }

    public function buys(){
        return $this->hasMany('App\Models\Buy');
    }

    public function nices(){
        return $this->hasMany('App\Models\Nice');
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