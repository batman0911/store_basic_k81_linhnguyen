<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function getIndex()
    {
        return view('backend.index');
    }

    public function logout()
    {
        Auth::logout();
        // Xóa session Auth::user()
        // Chuyển Auth::check() thành false
        return redirect('login');
    }
}
