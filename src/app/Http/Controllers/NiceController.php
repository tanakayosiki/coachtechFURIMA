<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nice;
use Auth;
use App\Models\Item;

class NiceController extends Controller
{
    public function nice(Item $item,$id){
        $user=Auth::user();
        Nice::create([
            'item_id'=>$id,
            'user_id'=>Auth::user()->id,
        ]);
        return back();
    }

    public function unNice($id){
        $item=Item::find($id);
        $user=Auth::user()->id;
        $nice=Nice::where('item_id',$id)->where('user_id',$user)->first();
        $nice->delete();
        return back();
    }
}
