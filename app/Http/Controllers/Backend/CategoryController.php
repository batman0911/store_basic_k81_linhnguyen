<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\Backend\CategoryRequest;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function getCategory()
    {
        return view('backend.category.category');
    }

    public function postCategory(CategoryRequest $request)
    {
        dd($request->all());
    }

    public function getEditCategory()
    {
        return view('backend.category.editcategory');
    }
}
