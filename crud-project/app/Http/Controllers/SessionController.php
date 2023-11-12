<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SessionController extends Controller
{
    function index()
    {
        // Go to Home
        return Redirect::to('/login');
        
    }

    function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Please fill in the email address',
            'password.required' => 'Please fill in the password',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/vehicles');
        }else{
            return back()->withErrors(['email' => 'Invalid login credentials']);
        }   
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }

}
