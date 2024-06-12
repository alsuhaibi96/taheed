<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
   // Handle login request
   public function login(Request $request)
   {
       $credentials = $request->validate([
           'email' => 'required|email',
           'password' => 'required',
       ]);

       if (Auth::attempt($credentials) && Auth::user()->role === 'customer') {
        $request->session()->regenerate();
        return redirect()->route('customer.dashboard');
    }
  

       return back()->withErrors([
           'email' => 'The provided credentials do not match our records.',
       ]);
   }

   public function dashboard()
   {
       return view('customer.dashboard'); 
   }
}
