<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
// use App\Http\Requests\Backend\UserRequest;
use App\Http\Requests\Backend\UserRequest;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     return view('backend.user.listuser');
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     return view('backend.user.adduser');
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

    public function getListUser()
    {
        $data['users'] = User::paginate(5);
        return view('backend.user.listuser', $data);
    }

    public function getAddUser()
    {
        return view('backend.user.adduser');
    }

    public function postAddUser(Request $request)
    {
        echo "Them thanh vien";
        // dd($request->all());
        $user = new User;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->level = $request->level;
        $user->save();
        // dd($user->toarray());
        return redirect('/admin/user')->with('thongbao', 'Đã thêm thành công');
    }

    public function getEditUser($id)
    {
        $data['user'] = User::findOrFail($id);
        return view('backend.user.edituser', $data);
    }

    public function postEditUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->email = $request->email;
        if ($request->password != '') {
            $user->password = $request->password;
        }
        $user->name = $request->name;   
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->level = $request->level;
        $user->update();
        return redirect()->back()->with('thongbao', 'Đã sửa thành công!');
    }

    public function delUser($id)
    {
        // $user = User::find($id);
        // $user->delete();
        User::destroy($id);
        return redirect()->back()->with('thongbao', 'Đã xóa thành công!');
    }

}
