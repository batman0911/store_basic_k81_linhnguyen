<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\Backend\ProductRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     return view('backend.product.listproduct');
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     return view('backend.product.addproduct');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }

    public function getListProduct()
    {
        // return Product::paginate(4);
        $data['products'] = Product::paginate(4);
        return view('backend.product.listproduct', $data);
    }

    public function getAddProduct()
    {
        $data['categories'] = Category::all();
        return view('backend.product.addproduct', $data);
    }

    public function postAddProduct(ProductRequest $request)
    {
        // dd($request->all());
        // return redirect('/admin/product')->with('thongbao', )
        $product = new Product;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name, '-');
        $product->price = $request->price;
        $product->featured = $request->featured;
        $product->state = $request->state;
        $product->info = $request->info;
        $product->description = $request->describe;

        if ($request->hasFile('img')) {
            // lưu request vào biến file
            $file = $request->img;
            // Lấy tên file, hàm getClientOriginnalExtension() dùng để lấy phần mở rộng của file
            $fileName = Str::slug($request->name,'-').'.'.$file->getClientOriginalExtension();
            // lưu file vào thư mục backend/img
            $file->move('backend/img', $fileName);
            // lưu tên file vào cơ sở dữ liệu
            $product->image = $fileName;
        } else {
            $product->image = 'no-img.jpg';
        }
        
        // $product->image = 
        $product->category_id = $request->category;

        $product->save();

        return redirect('/admin/product')->with('thongbao', 'Đã thêm thành công');
    }

    public function getEditProduct($product_id)
    {
        $data['categories'] = Category::all();
        $data['product'] = Product::findOrFail($product_id);
        return view('backend.product.editproduct', $data);
    }

    public function postEditProduct(ProductRequest $request, $product_id)
    {
        $product = Product::find($product_id);
        $product->code = $request->code;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name, '-');
        $product->price = $request->price;
        $product->featured = $request->featured;
        $product->state = $request->state;
        $product->info = $request->info;
        $product->description = $request->describe;

        if ($request->hasFile('img')) {
            if($product->image != 'no-img.jpg')
            {
                unlink('backend/img'.$product->image);
            }
            // lưu request vào biến file
            $file = $request->img;
            // Lấy tên file, hàm getClientOriginnalExtension() dùng để lấy phần mở rộng của file
            $fileName = Str::slug($request->name,'-').'.'.$file->getClientOriginalExtension();
            // lưu file vào thư mục backend/img
            $file->move('backend/img', $fileName);
            // lưu tên file vào cơ sở dữ liệu
            $product->image = $fileName;
        } 
        
        // $product->image = 
        $product->category_id = $request->category;

        $product->save();

        return redirect()->back()->with('thongbao', 'Cập nhật thành công!');

    }

}
