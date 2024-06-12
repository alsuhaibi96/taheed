<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SadiqSalau\LaravelOtp\Facades\Otp;

class OtpController extends Controller
{
    public function verify(Request $request)
    {

        $request->validate([
            'email'    => ['required', 'string', 'email', 'max:255'],
            'code'     => ['required', 'string']
        ]);
    
        $otp = Otp::identifier($request->email)->attempt($request->code);
    
        if($otp['status'] != Otp::OTP_PROCESSED)
        {
            abort(403, __($otp['status']));
        }
    
        return view('customer.dashboard');
    }

    public function resend(Request $request){
        $request->validate([
            'email'    => ['required', 'string', 'email', 'max:255']
        ]);
    
        $otp = Otp::identifier($request->email)->update();
    
        if($otp['status'] != Otp::OTP_SENT)
        {
            abort(403, __($otp['status']));
        }
        return __($otp['status']);
    }

    public function showVerifyForm($email) {
        return view('auth.verify', ['email' => $email]);
    }
}
