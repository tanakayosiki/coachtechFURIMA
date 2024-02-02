<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopComment extends Model
{
    use HasFactory;

    protected $fillable=['room_id','comment','user_id'];

    public function room(){
        return $this->belongsTo('App\Models\Room');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
