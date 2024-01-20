<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    use RegistersUsers, SendsPasswordResetEmails;
    //

    public function showForm(){
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
    
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );
    
        if ($response == Password::RESET_LINK_SENT) {
            return $this->sendResetLinkResponse($request, $response)->with('status', 'Password reset link sent successfully!');
        } else {
            return $this->sendResetLinkFailedResponse($request, $response);
        }
    }    
}
