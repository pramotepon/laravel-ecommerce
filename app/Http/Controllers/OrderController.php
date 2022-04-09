<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = Cart::where('user_id',Auth::user()->id)->where('status',1)->latest()->get();
        return view('pages.order', compact('orders'));
    }
}
