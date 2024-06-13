<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Payment;
use App\Models\Rental;
use App\Models\User;
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

   public function destroy($id)
   {
    $customer=User::findOrFail($id);
    $customer->delete();

    return redirect()->back()->with('success','Customer deleted successfully');

   }
   public function dashboard()
   {
    $data=$this->fetchCustomerData();

       return view('customer.dashboard',compact('data')); 
   }

   private function fetchCustomerData()
   {
       $contracts=Contract::where('user_id',Auth::id())->count();
       $rentals=Rental::where('user_id',Auth::id())->count();
       $user=User::find(Auth::id());
       $totalSales = Payment::sum('payment_amount');


       return [
           'contracts'=>$contracts,
           'rentals'=>$rentals,
           'user'=>$user,
           'totalSales'=>$totalSales
       ];
   }
}
