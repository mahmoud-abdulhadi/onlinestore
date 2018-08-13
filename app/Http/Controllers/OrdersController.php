<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order ; 

class OrdersController extends Controller
{
    public function index(){



    	$orders = Order::latest()->get();


    	$orders->transform(function($order,$key)
        {
         $order->cart = unserialize($order->cart);
        return $order;
         });


    	return view('admin.dashboard.orders.index',compact('orders'));


    }
}
