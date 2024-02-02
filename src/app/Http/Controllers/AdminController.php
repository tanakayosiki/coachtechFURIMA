<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\Item;
use App\Models\Room;
use App\Models\ShopComment;
use App\Models\Shop;

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
        $item=Item::whereHas('sell',function($query)use($id){
            $query->where('user_id',$id);
        })->first();
        $user->delete();
        optional($item)->delete();
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
