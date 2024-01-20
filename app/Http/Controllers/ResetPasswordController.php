<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    
    protected function reset(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password-confirm' => 'required|min:8|same:password',
        ]);

        // $updatePassword = DB::table('users')
        //     ->where([
        //         'email' => $request->email,
        //         'password_reset_token' => $request->token
        //     ])->first();

        // if (!$updatePassword){
        //     return redirect()->route('password.reset',['token' => $request->token])->with('error', 'Something wrong!!!');
        // }

        User::where("email",$request->email)->update(['password' => Hash::make($request->password)]);

        return redirect()->route('login')->with('success', 'Password has changed successfully.');
    }
}
