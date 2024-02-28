<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Shop;
use App\Models\Item;
use App\Models\ShopSell;
use Storage;
use App\Http\Requests\SellRequest;

class ShopSellController extends Controller
{
    public function index(){
        $user=Auth::user();
        $shop=Shop::whereHas('staffs',function($query)use($user){$query->where('user_id',$user->id);
        })->first();
        return view('shop_sell',compact('shop'));
    }

    public function shopSell(SellRequest $request){
        $id=$request['id'];
        $img=$request->file('img');
        $path=Storage::disk('s3')->put('/',$img);
        $sell=Item::create([
            'situation'=>$request['situation'],
            'category'=>$request['category'],
            'img'=>$path,
            'name'=>$request['name'],
            'brand'=>$request['brand'],
            'detail'=>$request['detail'],
            'amount'=>$request['amount']
        ]);
        ShopSell::create([
            'shop_id'=>$id,
            'item_id'=>$sell->id,
        ]);
        return redirect('/shop')->with('message','出品ありがとうございます');
    }
}
