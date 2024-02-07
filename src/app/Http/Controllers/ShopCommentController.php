<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Item;
use App\Models\Room;
use App\Models\Shop;
use App\Models\ShopComment;

class ShopCommentController extends Controller
{
    public function index($id){
        $user=Auth::user();
        $item=Item::find($id);
        $itemShop=Shop::whereHas('shopSells',function($query)use($id){
            $query->where('item_id',$id);
        })->first();
        $room=Room::where('user_id',$user->id)->where('item_id',$item->id)->first();
        $comments=ShopComment::where('room_id',optional($room)->id)->get();
        return view('shop_comment',compact('user','item','comments','itemShop'));
    }

    public function postShopComment(Request $request,$item,$itemShop){
        $user=Auth::user();
        $nowRoom=Room::where('user_id',$user->id)->where('item_id',$item)->first();
        $null=null;
        if($nowRoom===$null){
        $room=Room::create([
            'user_id'=>$user->id,
            'item_id'=>$item,
            'shop_id'=>$itemShop,
        ]);
        ShopComment::create([
            'room_id'=>$room->id,
            'user_id'=>$user->id,
            'comment'=>$request['comment'],
        ]);
        }else{
            ShopComment::create([
            'room_id'=>$nowRoom->id,
            'user_id'=>$user->id,
            'comment'=>$request['comment'],
        ]);
        }
        return back();
    }

    public function commentList($id){
        $rooms=Room::where('item_id',$id)->get();
        return view('comment_list',compact('rooms'));
    }

    public function staffComment($id){
        $user=Auth::user();
        $room=Room::find($id);
        $itemShop=Shop::whereHas('shopSells',function($query)use($room){
            $query->where('item_id',$room->item_id);
        })->first();
        $comments=ShopComment::where('room_id',$room->id)->get();
        return view('staff_Comment',compact('room','comments','itemShop','user'));
    }

    public function postStaffComment(Request $request,$id){
        $user=Auth::user();
        ShopComment::create([
            'room_id'=>$id,
            'comment'=>$request['comment'],
            'user_id'=>$user->id,
        ]);
        return back();
    }

    public function deleteShopComment($id){
        $comment=ShopComment::find($id);
        $comment->delete();
        return back();
    }
}
