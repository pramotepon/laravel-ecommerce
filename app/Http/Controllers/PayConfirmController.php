<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayConfirmController extends Controller
{
    public function index(){
        return view('pages.pay-confirm');
    }
}
