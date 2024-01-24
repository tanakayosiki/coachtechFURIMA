<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Item;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
    public function index($id){
        $user=Auth::user();
        $item=Item::find($id);
        $itemUser=User::whereHas('sells',function($query)use($id){
        $query->where('item_id',$id);})->first();
        $comments=Comment::where('item_id',$id)->get();
        return view('comment',compact('user','item','comments','itemUser'));
    }

    public function postComment(Request $request,$id){
        $user=Auth::user();
        Comment::create([
            'user_id'=>$user->id,
            'item_id'=>$id,
            'comment'=>$request['comment'],
        ]);
        return back();
    }

    public function deleteComment($id){
        $comment=Comment::find($id);
        $comment->delete();
        return back();
    }
}
