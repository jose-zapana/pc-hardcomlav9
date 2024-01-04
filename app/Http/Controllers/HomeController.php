<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard() {
        return view('dashboard.home');
    }

    public function eager()
    {
        $carts = Cart::with('customer.user')->get();
        return view('pusher.eager', compact('carts'));
    }

    public function lazy()
    {
        $carts = Cart::all();
        return view('pusher.eager', compact('carts'));
    }
}
