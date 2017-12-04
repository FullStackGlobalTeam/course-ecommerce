<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\products;

class ShoppingController extends Controller
{
    public function addToCart()
    {

        $product = products::find(request()->pdt_id);

        $cart = Cart::add([
           'id' => $product->id,
           'name' => $product->name,
           'qty' => request()->qty,
           'price' => $product->price,
        ]);

        Cart::associate($cart->rowId, 'App\products');

        return redirect()->route('cart');
    }

    public function cart()
    {
//        Cart::destroy();
        return view('cart');
    }


    public function cartDelete($id)
    {
        Cart::remove($id);

        return redirect()->back();
    }

    public function incr($id, $qty)
    {
        Cart::update($id, $qty+1);

        return redirect()->back();
    }

    public function decr($id, $qty)
    {
        Cart::update($id, $qty-1);

        return redirect()->back();
    }

    function rapidAdd($id)
    {
        $product = products::find($id);

        $cart = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
        ]);

        Cart::associate($cart->rowId, 'App\products');

        return redirect()->route('cart');
    }

}
