<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $id = Auth::id();
        // $user = User::where('id', $id)->first();
        // request()->session()->put("type", $user->type);

//alternative is
        // {{ Auth::user()->type }}

        return view('home');
    }
}
