<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function getIndex()
    {
        $year = Carbon::now()->format('Y');
        $month = Carbon::now()->format('m');
        // dd($month);
        for ($i=1; $i <= $month; $i++) { 
            $dl['Tháng '.$i] = Order::where('state', 1)
            ->whereMonth('updated_at', $i)
            ->whereYear('updated_at', $year)
            ->sum('total');
        }
        // dd($dl);
        $data['month'] = $month;
        $data['order'] = Order::whereMonth('updated_at', $month)->where('state', 1)->get();
        $data['dl'] = $dl;
        return view('backend.index', $data);
    }

    public function logout()
    {
        Auth::logout();
        // Xóa session Auth::user()
        // Chuyển Auth::check() thành false
        return redirect('login');
    }
}
