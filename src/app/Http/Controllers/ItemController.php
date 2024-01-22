<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Item;

class ItemController extends Controller
{
    public function index(Request $request){
        $user=Auth::user();
        $items=Item::with('buy')->get();
        return view('item',compact('user','items'));
    }

    public function myList(){
        $user=Auth::user();
        $items=Item::whereHas('nices',function($query)use($user){
        $query->where('user_id',$user->id);
        })->get();
        return view('item',compact('user','items'));
    }

    public function detail($id){
        $item=Item::find($id);
        $user=Auth::user();
        return view('detail',compact('user','item'));
    }
}
