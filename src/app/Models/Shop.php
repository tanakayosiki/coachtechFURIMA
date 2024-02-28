<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable=['img','name','detail'];

    public function staffs(){
        return $this->hasMany('App\Models\Staff');
    }

    public function shopSells(){
        return $this->hasMany('App\Models\ShopSell');
    }

    public function rooms(){
        return $this->hasMany('App\Models\Room');
    }
}
