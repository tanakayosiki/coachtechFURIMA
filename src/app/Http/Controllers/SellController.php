<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;

class SellController extends Controller
{
    public function index(Request $request){
        $id=$request['id'];
        $user=User::find($id);
        return view('sell',compact('user'));
    }

    public function sell(Request $request){
        $id=$request['id'];
        $img=$request->file('img');
        $path=$img->store('img_path','public');
        $sell=Item::create([
            'situation'=>$request['situation'],
            'category'=>$request['category'],
            'img'=>$path,
            'name'=>$request['name'],
            'brand'=>$request['brand'],
            'detail'=>$request['detail'],
            'amount'=>$request['amount']
        ]);
        $sell->users()->sync($id);
        return redirect('/')->with('message','出品ありがとうございます');
    }
}
