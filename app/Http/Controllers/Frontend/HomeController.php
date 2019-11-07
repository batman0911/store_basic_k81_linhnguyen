<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    function getIndex() {
        $data['noibat'] = Product::where('image', '<>', 'no-img.jpg')->where('featured', '1')
        ->orderBy('updated_at', 'desc')->take(4)->get();
        
        $data['moi'] = Product::where('image', '<>', 'no-img.jpg')
        ->orderBy('updated_at', 'desc')->take(4)->get();
        return view('frontend.index', $data);
    }
    function getAbout() {
        return view('frontend.about');
    }
    function getContact() {
        return view('frontend.contact');
    }
}
