<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Profile;
use App\Models\Item;
use App\Models\Buy;
use App\Http\Requests\AddressUpdateRequest;

class BuyController extends Controller
{
    public function index($id){
        $user=Auth::user();
        $profile=Profile::where('user_id',$user->id)->first();
        $null=null;
        $item=Item::find($id);
        if($profile===$null){
            return redirect('/')->with('message','プロフィール登録が完了していません。マイページより登録をお願い致します。');
        }else{
            return view('buy',compact('profile','user','item'));
        }
    }

    public function buy(Request $request,$id){
        $user=Auth::user();
        $profile=Profile::where('user_id',$user->id)->first();
        $item=Item::find($id);
        Buy::create([
            'user_id'=>$user->id,
            'item_id'=>$item->id,
            'profile_id'=>$profile->id,
            'payment'=>$request['payment']
        ]);
        return redirect('/')->with('message','ご購入ありがとうございます!');
    }

    public function address($id){
        $user=Auth::user();
        $profile=Profile::where('user_id',$user->id)->first();
        $item=Item::find($id);
        return view('address_update',compact('profile','item'));
    }

    public function postAddress(AddressUpdateRequest $request,$id){
        $user=Auth::user();
        $profile=Profile::where('user_id',$user->id)->first();
        $item=Item::find($id);
        $name=$profile->name;
        $profile->update([
            'user_id'=>$user->id,
            'name'=>$name,
            'post_code'=>$request['post_code'],
            'address'=>$request['address'],
            'building'=>$request['building'],
        ]);
        return redirect()->route('buy',['id'=>$id])->with('message','配送先を更新しました');
    }
}
