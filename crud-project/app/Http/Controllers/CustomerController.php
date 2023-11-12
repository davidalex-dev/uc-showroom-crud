<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function index(){

        $customers = Customer::withCount('orders')->get();

        return view('customer.index')
        ->with('customers', $customers);;
    }

    public function create()
    {
        return view('customer.create');
    }

    public function show($id)
    {
        $customer = Customer::leftJoin('order', 'customer.id', '=', 'order.customerID')
            ->select('customer.*', 'order.id as order_id', 'order.vehicleID', 'order.created_at')
            ->find($id);

        if (!$customer) {
            return redirect()->route('customer.index')->with('error', 'Customer not found.');
        }

        return view('customer.show')->with('customer', $customer);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'telephoneNumber' => 'required',
            'address' => 'required',
            'IDcard' => 'required',
        ]);
    
        Customer::create([
            'name' => $request->input('name'),
            'telephoneNumber' => $request->input('telephoneNumber'),
            'address' => $request->input('address'),
            'IDcard' => $request->input('IDcard'),
        ]);
    
        return redirect()->route('user.index');
    }

    public function edit(Customer $user)
    {
        return view('customer.edit', compact('user'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string',
        'telephoneNumber' => 'required|string',
        'address' => 'required|string',
        'IDcard' => 'required|string',
        // Add other validation rules as needed
    ]);

    $customer = Customer::findOrFail($id);

    $customer->fill($request->all())->save();

    return redirect()->route('user.index');
}

    public function destroy(Customer $user)
    {
        Order::where('customerID', $user->id)->delete();

        $user->delete();

        return redirect()->route('user.index');
    }
}
