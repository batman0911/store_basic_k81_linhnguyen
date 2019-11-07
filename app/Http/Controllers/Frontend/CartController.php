<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    function getCart() {
        $data['items'] = Cart::content();
        $data['total'] = Cart::total(0, '', ',');
        // dd($data);
        return view('frontend.cart.cart', $data);
    }

    function addCart(Request $request)
    {
        // dd($request->toArray());
        $prd = Product::findOrFail($request->id_product);
        // dd($prd->toArray());
        if($request->has('quantity'))
        {
            $qty = $request->quantity;
        }
        else
        {
            $qty = 1;
        }
        Cart::add([
            'id' => $prd->code, 
            'name' => $prd->name, 
            'qty' => $qty, 
            'price' => $prd->price, 
            'weight' => 0, 
            'options' => ['image' => $prd->image]]);
        // dd($data);
        return redirect('/cart');
    }

    function updateCart($rowId, $qty)
    {
        Cart::update($rowId, $qty);
        return 'success';
    }

    function delCart($rowid)
    {
        Cart::remove($rowid);
        return redirect()->back();
    }
}
