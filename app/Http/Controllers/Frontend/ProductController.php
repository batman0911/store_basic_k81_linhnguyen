<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    function getShop(Request $request) {
        // dd($request->all());
        if ($request->start != '') {
            $data['products'] = Product::whereBetween('price', [$request->start, $request->end])->paginate(6);
        }
        else
        {
            $data['products'] = Product::orderBy('updated_at', 'desc')->paginate(6);
        }
        $data['categories'] = Category::all();
        
        return view('frontend.product.shop', $data);
    }

    function getCatPrd($slug, Request $request)
    {
        if ($request->start != '') {
            $data['products'] = Category::where('slug', $slug)->firstOrFail()->product()
            ->whereBetween('price', [$request->start, $request->end])->paginate(6);
        }
        else
        {
            $data['products'] = Category::where('slug', $slug)->firstOrFail()->product()->paginate(6);
        }
        $data['categories'] = Category::all();
        
        return view('frontend.product.shop', $data);
    }

    function getDetail($slug) {
        // $data['product'] = Product::where('id', $id);
        // $data['product'] = Product::findOrFail($id);
        // $data['product'] = Product::where('slug', $slug)->firstOrFail();
        // dd($data['product']->toArray());
        // dd($data['product']->toArray());
        // var_dump($data['product']);
        $array = explode('-', $slug);
        $id = array_pop($array);
        // dd($id);
        $data['moi'] = Product::where('image', '<>', 'no-img.jpg')
        ->orderBy('updated_at', 'desc')->take(4)->get();
        $data['product'] = Product::findOrFail($id);
        return view('frontend.product.detail', $data);
    }
}
