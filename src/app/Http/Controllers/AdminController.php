<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\Item;
use App\Models\Room;
use App\Models\ShopComment;
use App\Models\Shop;
use DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin');
    }

    public function userList(){
        $admin=Auth::user();
        $users=User::all();
        return view('admin_delete',compact('users','admin'));
    }

    public function delete($id){
        $user=User::find($id);
        $items=Item::whereHas('sell',function($query)use($id){
            $query->where('user_id',$id);
        })->get();
        $role=DB::table('role_user')->where('user_id',$user->id)->first();
        $shop=Shop::whereHas('staffs',function($query)use($id){
            $query->where('user_id',$id);
        })->first();
        $shopSells=Item::whereHas('shopsell',function($query)use($shop){
            $query->where('shop_id',optional($shop)->id);
        })->get();
        $null=null;
        $user->delete();
        foreach($items as $item){
            $item->delete();
        }
        if($role->role_id===2){
        $shop->delete();
        foreach($shopSells as $shopSell){
            $shopSell->delete();
        }
        }
        return back()->with('message','削除しました');
    }

    public function check(){
        $rooms=Room::all();
        return view('check',compact('rooms'));
    }

    public function checkComment($id){
        $room=Room::find($id);
        $comments=ShopComment::where('room_id',$id)->get();
        $item=Item::find($room->item_id);
        $itemShop=Shop::whereHas('shopSells',function($query)use($room){
            $query->where('item_id',$room->item_id);
        })->first();
        return view('check_comment',compact('room','comments','item','itemShop'));
    }
}
