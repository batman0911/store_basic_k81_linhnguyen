<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\LoginRequest;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function getLogin()
    {
        // return view('backend.login');
        if (Auth::check()) {
            return redirect('/amdin');
        }
        else {
            return redirect('/login');
        }
    }

    public function postLogin(LoginRequest $request)
    {
        // dd($request->all());
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($login)) {
            return redirect('/admin');
        }
        else {
            return redirect()->back()->with('alert', 'Đăng nhập không thành công');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }

}
