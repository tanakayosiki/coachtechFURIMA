<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Sell;
use App\Models\Profile;
use Storage;

class SellController extends Controller
{
    public function index(Request $request){
        $id=$request['id'];
        $user=User::find($id);
        $profile=Profile::where('user_id',$user->id)->first();
        $null=null;
        if($profile===$null){
            return redirect('/')->with('message','プロフィール登録が完了していません。マイページより登録をお願い致します。');
        }else{
            return view('sell',compact('user'));
        }
    }

    public function sell(Request $request){
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
        Sell::create([
            'user_id'=>$id,
            'item_id'=>$sell->id,
        ]);
        return redirect('/')->with('message','出品ありがとうございます');
    }
}
