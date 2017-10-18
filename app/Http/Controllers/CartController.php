<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function view()
    {
        return view("medCheckout");
    }
    public function addCart(Request $request)
    {

    }
}
