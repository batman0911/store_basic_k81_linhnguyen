<?php

namespace App\Http\Controllers\Backend;

use App\models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\CategoryRequest;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function getCategory()
    {
        $categories = Category::all();
        return view('backend.category.category')->with('categories', $categories);
    }

    public function postCategory(CategoryRequest $request)
    {
        // dd($request->all());
        $category = new Category;
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        // Đối với bản 6.0 phải khai báo thư viện slug
        // dùng Str::slug($request->name, '-')
        $category->parent_id = $request->parent;
        $category->save();
        return redirect()->back()->with('thongbao', 'Đã thêm danh mục '.$request->name.' thành công!');
    }

    public function getEditCategory($cat_id)
    {
        $data['category'] = Category::find($cat_id);
        $data['categories'] = Category::all()->toarray();
        return view('backend.category.editcategory', $data);
    }

    public function delCategory($cat_id)
    {
        // Tìm danh mục muốn xóa
        $category = Category::find($cat_id);
        // Lấy parent của danh mục muốn xóa
        $parent_id = $category->parent_id;
        // Cập nhật parent của danh mục con = danh mục của danh mục bị xóa
        Category::where('parent_id', $category->id)->update(['parent_id' => $parent_id]);
        // Xóa danh mục 
        Category::destroy($cat_id);
        return redirect()->back();
    }
}
