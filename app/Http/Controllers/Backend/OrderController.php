<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function getOrder()
    {
        $data['orders'] = Order::where('state', '0')->get();
        return view('backend.order.order', $data);
    }

    public function getDetailOrder($id)
    {
        $data['order'] = Order::find($id);
        return view('backend.order.detailorder', $data);
        // $order = Order::find($id);
        // dd($order->product_orders->toarray());
    }

    public function getProcessed()
    {
        $data['orders'] = Order::where('state', '1')->get();
        return view('backend.order.processed', $data);
    }

    public function xuLy($id)
    {
        $order = Order::findOrFail($id);
        $order->state = '1';
        $order->save();
        return redirect('/admin/order/processed');
    }
}
