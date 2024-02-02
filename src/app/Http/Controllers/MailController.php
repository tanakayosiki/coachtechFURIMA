<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\AdminMail;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use App\Models\Shop;

class MailController extends Controller
{
    public function sendInvite(Request $request){
        $user=Auth::user();
        $email=$user->email;
        $shop=Shop::whereHas('staffs',function($query)use($user){
            $query->where('user_id',$user->id);
        })->first();
        $to=$request['email'];
        $inviter=User::where('email',$to)->first();
        $url=['url'=>URL::temporarySignedRoute(
            'mailInvite',now()->addDays(1),
            ['shop'=>$shop->id,
            'user'=>$inviter->id]
        )];
        Mail::to($to)->send(new SendMail($email,$inviter,$url));
        return redirect('/shop/management')->with('message','招待しました');
    }

    public function sendAdmin(){
        $tos=User::whereHas('roles',function($query){
            $query->where('role_id',3)->orWhere('role_id',2);
        })->get();
        foreach($tos as $to){
        Mail::to($to)->send(new AdminMail());
    }
        return back()->with('message','送信しました');
    }
}
