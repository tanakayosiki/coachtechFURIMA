<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MyPageController extends Controller
{
    public function profile(){
        $user=Auth::user();
        return view('profile',compact('user'));
    }
}
