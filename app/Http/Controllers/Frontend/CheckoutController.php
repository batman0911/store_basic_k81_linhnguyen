<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests\Frontend\CheckoutRequest;
// use App\http\request\Frontend\Checkoutrequest;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    function getCheckout() {
        return view('frontend.checkout.checkout');
    }

    function postCheckout(CheckoutRequest $request)
    {
        dd($request->all());
    }

    function getComplete() {
        return view('frontend.checkout.complete');
    }
}
