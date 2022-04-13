<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\PayConfirm;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $carts = Cart::where('user_id',Auth::user()->id)->where('status',0)->latest()->get();
        $amount = 0;
        foreach ($carts as $cart) {
            $amount += $cart->product->price * $cart->quantity;
        }
        return view('pages.cart', compact('carts','amount'));
    }

    public function addCart(Product $product){
        // เมื่่อ เท่ากับ user_id ของตัวเอง และเมื่อ id สินค้า เท่ากับในฐานข้อมูล และเมื่อ status = 0
        $user_cart = Cart::where('user_id',Auth::user()->id)->where('product_id',$product->id)->where('status',0)->count();

        if ($user_cart != 0) {
            return redirect()->back()->with('error', 'คุณเพิ่มสินค้านี้ไปแล้ว');
        }

        $cart = new Cart();
        $cart->product_id = $product->id;
        $cart->user_id = Auth::user()->id;
        $cart->save();

        return redirect()->back()->with('success', 'เพิ่มสินค้าสำเร็จ');
    }

    public function update(Request $request, Cart $cart){

        $cart->quantity = $request->quantity;
        $cart->save();

        return redirect()->back();

    }
    public function checkOut(Request $request){
        $request->validate([
            'fname'  =>  'required',
            'lname'  =>  'required',
            'address'  =>  'required',
            'slip_img'  =>  'required|image',
            'date' => 'required',
            'time'  =>  'required'
        ]);

        $file = $request->file('slip_img');
        $ext = $file->extension();
        $fileName = date('dmYHis').'.'.$ext;
        $path = public_path().'/images/slips';

        $file->move($path,$fileName);

        $code = date('dmYHis');

        $pay_confirm = new PayConfirm();
        $pay_confirm->code = $code;
        $pay_confirm->fname = $request->fname;
        $pay_confirm->lname = $request->lname;
        $pay_confirm->address = $request->address;
        $pay_confirm->image = $fileName;
        $pay_confirm->date = $request->date;
        $pay_confirm->time = $request->time;
        $pay_confirm->save();

        $cart = Cart::where('user_id', Auth::user()->id)->where('status', 0)
        ->update([
            'status' => 1,
            'order_code'    =>  $code
        ]);

        return redirect()->route('order.index');
    }

    public function destroy(Cart $cart){
        $cart->delete();
        return redirect()->back()->with('success', 'ลบสินค้าจากตะกร้าแล้ว');
    }
}
