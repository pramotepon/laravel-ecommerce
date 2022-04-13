<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\PayConfirm;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index(){
        $orders = PayConfirm::latest()->paginate(5);
        return view('admin.allOrder', compact('orders'));
    }

    public function update(PayConfirm $order, Request $request){

        $cart = Cart::where('order_code', $order->code)->update(['status'   =>  $request->status]);

        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.order.index')->with('success', 'อัพเดทสำเร็จ');
    }
}
