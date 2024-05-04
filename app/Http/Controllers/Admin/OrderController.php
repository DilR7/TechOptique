<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $pending_orders = Order::where('status', "pending")->latest()->get();
        return view('admin.pendingorders', compact('pending_orders'));
    }

    public function cancelOrder($id){
        Order::findOrFail($id)->delete();

        return redirect()->route('pendingorder')->with('message', 'Order Cancelled!');
    }

}
