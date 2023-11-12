<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\Order;
use App\Models\Customer;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function index()
    {
        $orders = Order::get();
        
        return view('order.index')
            ->with('orders', $orders);
    }

    public function create()
    {
        $customers = Customer::all();
        $vehicles = Vehicle::all();

        return view('order.create', ['customers' => $customers, 'vehicles' => $vehicles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customerID' => 'required',
            'vehicleID' => 'required',
            'quantity' => 'required',
        ]);
    

        Order::create([
            'customerID' => $request->input('customerID'),
            'vehicleID' => $request->input('vehicleID'),
            'total' => $request->input('quantity')
        ]);

        return redirect()->route('order.index');
    }

    public function edit($orderId)
    {
        $order = Order::findOrFail($orderId);
        $customers = Customer::all();
        $vehicles = Vehicle::all();

        return view('order.edit', ['order' => $order, 'customers' => $customers, 'vehicles' => $vehicles]);
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customerID' => 'required',
            'vehicleID' => 'required',
            'quantity' => 'required',
        ]);

        $order = Order::findOrFail($order->id);

        $order->fill([
            'customerID' => $request->input('customerID'),
            'vehicleID' => $request->input('vehicleID'),
            'total' => $request->input('quantity')
        ]);

        $order->save();

        return redirect()->route('order.index');
    }

    
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('order.index');
    }
    
}
