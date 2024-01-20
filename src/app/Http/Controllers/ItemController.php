<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Item;
use DB;

class ItemController extends Controller
{
    public function index(Request $request){
        $user=Auth::user();
        $items=Item::all();
        return view('item',compact('user','items'));
    }

    public function detail($id){
        $item=Item::find($id);
        $user=Auth::user();
        return view('detail',compact('user','item'));
    }
}
