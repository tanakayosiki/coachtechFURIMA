<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Item;

class StripeController extends Controller
{
    public function charge(Request $request,$id)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $item=Item::find($id);
        $amount=$item['amount'];
        $charge = Charge::create(array(
            'amount' => $amount,
            'currency' => 'jpy',
            'source'=> request()->stripeToken,
        ));
    return back();
    }
}
