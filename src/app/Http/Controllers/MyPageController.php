<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Profile;
use App\Models\Item;

class MyPageController extends Controller
{
    public function index(){
        $user=Auth::user();
        $profile=Profile::where('user_id',$user->id)->first();
        $myPages=Item::whereHas('sell',function($query)use($user){
            $query->where('user_id',$user->id);
        })->get();
        return view('my_page',compact('user','profile','myPages'));
    }

    public function buyList(){
        $user=Auth::user();
        $profile=Profile::where('user_id',$user->id)->first();
        $myPages=Item::whereHas('buy',function($query)use($user){
        $query->where('user_id',$user->id);
        })->get();
        return view('my_page',compact('user','profile','myPages'));
    }

    public function profile(){
        $user=Auth::user();
        $profile=Profile::where('user_id',$user->id)->first();
        return view('profile',compact('user','profile'));
    }

    public function postProfile(Request $request){
        $user=Auth::user();
        $img=$request->file('img');
        $path=optional($img)->store('img_path','public');
        $null=null;
        $profile=Profile::where('user_id',$user->id)->first();
        if($profile===$null){
        Profile::create([
            'user_id'=>$user->id,
            'img'=>$path,
            'name'=>$request['name'],
            'post_code'=>$request['post_code'],
            'address'=>$request['address'],
            'building'=>$request['building'],
        ]);
        return redirect('mypage')->with('message','プロフィールを更新しました');
    }else{
        $profile->update([
            'user_id'=>$user->id,
            'img'=>$path,
            'name'=>$request['name'],
            'post_code'=>$request['post_code'],
            'address'=>$request['address'],
            'building'=>$request['building'],
        ]);
        return redirect('mypage')->with('message','プロフィールを更新しました');
    }
    }
}
