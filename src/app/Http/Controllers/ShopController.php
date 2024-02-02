<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopSell;
use Auth;
use App\Models\Shop;
use App\Models\Item;


class ShopController extends Controller
{
    public function index(){
    $items=ShopSell::all();
    return view('shop',compact('items'));
    }

    public function shopDetail($id){
        $item=Item::find($id);
        $user=Auth::user();
        $shop=Shop::whereHas('staffs',function($query)use($user){
            $query->where('user_id',optional($user)->id);
        })->first();
        $itemShop=Shop::whereHas('shopSells',function($query)use($id){
            $query->where('item_id',$id);
        })->first();
        return view('shop_detail',compact('shop','item','user','itemShop'));
    }

    public function myList(){
        $user=Auth::user();
        $items=Item::whereHas('nices',function($query)use($user){
        $query->where('user_id',$user->id);
        })->get();
        return view('item',compact('user','items'));
    }
}
