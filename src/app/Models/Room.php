<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable=['shop_id','user_id','item_id'];

    public function comments(){
        return $this->hasMany('App\Models\ShopComment');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function item(){
        return $this->belongsTo('App\Models\Item');
    }

    public function shop(){
        return $this->belongsTo('App\Models\Shop');
    }
}
