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
        $category->parent_id = $request->parent;
        $category->save();
        return redirect()->back()->with('thongbao', 'Đã thêm danh mục '.$request->name.' thành công!');
    }

    public function getEditCategory()
    {
        return view('backend.category.editcategory');
    }
}
