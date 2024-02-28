<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Auth;
use App\Models\Staff;
use App\Models\Profile;
use Storage;
use DB;

class ManagementController extends Controller
{
    public function newShop(){
        $user=Auth::user();
        $role=DB::table('role_user')->where('user_id',$user->id)->first();
        $profile=Profile::where('user_id',$user->id)->first();
        $null=null;
        $shop=Staff::where('user_id',$user->id)->first();
        if($role->role_id===1){
            return redirect('/shop')->with('message','管理者はご利用できません');
        }
        if($profile===$null){
            return redirect('/')->with('message','プロフィール登録が完了していません。マイページより登録をお願い致します。');
        }elseif(empty($shop===$null)){
            return redirect('/shop')->with('message','店舗開設は１つのアカウントにつき、１店舗までです。');
        }else{
            return view('new_shop');
        }
    }

    public function postNewShop(Request $request){
        $user=Auth::user();
        $id=$user->id;
        $null=null;
        $img=$request->file('img');
        if(empty($img===$null)){
        $path=Storage::disk('s3')->put('/',$img);
        }else{
            $path=$null;
        }
        $shop=Shop::create([
            'img'=>$path,
            'name'=>$request['name'],
            'detail'=>$request['detail'],
        ]);
        Staff::create([
            'user_id'=>$id,
            'shop_id'=>$shop->id,
        ]);
        $user->roles()->sync(2);
        return redirect('/')->with('message','開設ありがとうございます!');
    }

    public function management(){
        $user=Auth::user();
        $staff=Staff::where('user_id',$user->id)->first();
        $null=null;
        if($staff===$null){
            return redirect('/shop')->with('message','店舗代表者、ショップスタッフのみご利用いただけます');
        }else{
            return view('shop_management');
        }
    }

    public function invite(){
        $user=Auth::user();
        $shop=Shop::whereHas('staffs',function($query)use($user){
            $query->where('user_id',$user->id);
        })->first();
        return view('invite',compact('shop'));
    }

    public function mailInvite(Request $request,$shop,$user){
        return view('mail_invite',compact('shop','user'));
    }

    public function postMailInvite($shop,$user){
        Staff::create([
            'shop_id'=>$shop,
            'user_id'=>$user,
        ]);
        return redirect('/')->with('message','承認ありがとうございました!');
    }

    public function staffList(){
        $user=Auth::user();
        $shop=Shop::whereHas('staffs',function($query)use($user){
            $query->where('user_id',$user->id);
        })->first();
        $staffs=Staff::whereHas('shop',function($query)use($shop){
            $query->where('shop_id',$shop->id);
        })->get();
        return view('staff_delete',compact('staffs','user'));
    }

    public function staffDelete($id){
        $staff=Staff::find($id);
        $staff->delete();
        return redirect('/shop/management')->with('message','スタッフを削除しました');
    }
}
