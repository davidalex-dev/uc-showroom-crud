<?php

namespace App\Http\Controllers;

use App\Models\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index(){

        $customers = Customer::withCount('orders')->get();

        return view('layouts.user.index')
        ->with('customers', $customers);;
    }
}
