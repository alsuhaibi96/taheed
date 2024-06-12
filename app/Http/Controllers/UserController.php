<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rules;

use SadiqSalau\LaravelOtp\Facades\Otp;

use App\Otp\UserRegistrationOtp;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function register(Request $request){
        $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password'      => ['required',  Rules\Password::defaults(),'confirmed'],
        ]);
    
        $otp = Otp::identifier($request->email)->send(
            new UserRegistrationOtp(
                name: $request->name,
                email: $request->email,
                password: $request->password,
            ),
            Notification::route('mail', $request->email)
        );
    
        if($otp['status'] === 'otp.sent'){
            return redirect()->route('otp.verify.form', ['email' => $request->email]);
        } else {
            return back()->withErrors(['otp_error' => 'Failed to send OTP.']);
        }
    }

    public function updateUserDetails(Request $request)
    {
        $request->validate([
            'mobile' => 'nullable|string',
            'full_name' => 'nullable|string',
            'national_id' => 'nullable|string',
            'number_of_motorcycles' => 'nullable|integer',
        ]);

        $user = Auth::user(); 
        $user->mobile = $request->mobile;
        $user->full_name = $request->full_name;
        $user->national_id = $request->national_id;
        $user->number_of_motorcycles = $request->number_of_motorcycles;
        $user->save();

        return redirect()->back()->with('success', 'User details updated successfully.');
    }

    public function fetchCustomers()
    {
        $customerCount=User::where('role','customer')->count();
        $totalSales=Payment::sum('payment_amount');
        $rentals=Rental::count();



        return view('admin/dashboard', compact('customerCount', 'totalSales', 'rentals'));
    }
}
