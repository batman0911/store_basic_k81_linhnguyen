<?php

namespace App\Http\Controllers\Backend;

// use Auth;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\LoginRequest;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('backend.login');
        // if (Auth::check()) {
        //     return redirect('/admin');
        // }
        // else {
        //     return redirect('/login');
        // }
    }

    public function postLogin(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Auth::check() sẽ bằng true
            // Auth::user() lấy ra thông tin người đăng nhập từ bảng model liên kết
            return redirect('admin');
        }
        else {
            return redirect()->back()->with('thongbao', 'Tài khoản hoặc mật khẩu không chính xác')->withInput();
        }
    }

    public function getLogout()
    {
        // Auth::logout();
        // return redirect()->route('getLogin');
    }

}
