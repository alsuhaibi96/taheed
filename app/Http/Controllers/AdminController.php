<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
     // Show the login form
     public function showLoginForm()
     {
         return view('admin.login');
     }
 
     // Handle login request
     public function login(Request $request)
     {
         $credentials = $request->validate([
             'email' => 'required|email',
             'password' => 'required',
         ]);
 
         if (Auth::guard('admin')->attempt($credentials)) {
             $request->session()->regenerate();
             return redirect()->intended('admin/dashboard');
         }
 
         return back()->withErrors([
             'email' => 'The provided credentials do not match our records.',
         ]);
     }
 
     // Admin dashboard
     public function dashboard()
     {
         return view('admin.dashboard');
     }
    public function index(){
        return view('admin.dashboard');
    }
}
