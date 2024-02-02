<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopSell extends Model
{
    use HasFactory;

    protected $fillable=['item_id','shop_id'];

    public function shop(){
        return $this->belongsTo('App\Models\Shop');
    }

    public function item(){
        return $this->belongsTo('App\Models\Item');
    }
}
