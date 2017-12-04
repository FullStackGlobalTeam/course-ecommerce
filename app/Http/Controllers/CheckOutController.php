<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Cart;
use Stripe\Stripe;
use Stripe\Charge;
use Session;

class CheckOutController extends Controller
{
    public function index()
    {

        if (Cart::content()->count() == 0){
            Session::flash('info', 'Tu pedido esta vácio');

            return redirect()->back();
        }

        return view('checkout');
    }

    public function pay()
    {
        Stripe::setApiKey("sk_test_62bQpTPhmiXDjY5bAiL5Mam8");
        $charge = Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' => 'udemy course practice selling books',
            'source' => request()->stripeToken
        ]);
        Session::flash('success', 'Purchase successfull. wait for our email.');
        Cart::destroy();
        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessfull);
        return redirect('/');
    }

}
