<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable=['situation','category','img','name','detail','brand','amount'];

    public function users(){
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }
}
