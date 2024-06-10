<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rules;

use SadiqSalau\LaravelOtp\Facades\Otp;

use App\Otp\UserRegistrationOtp;

class UserController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function register(Request $request){
        $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password'      => ['required',  Rules\Password::defaults()],
        ]);
    
        $otp = Otp::identifier($request->email)->send(
            new UserRegistrationOtp(
                name: $request->name,
                email: $request->email,
                password: $request->password
            ),
            Notification::route('mail', $request->email)
        );
    
        if($otp['status'] === 'OTP_SENT'){
            return redirect()->route('otp.verify.form', ['email' => $request->email]);
        } else {
            return back()->withErrors(['otp_error' => 'Failed to send OTP.']);
        }
    }
}
