<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showRegistrationForm() 
    {
        return view('register');
    }

    public function register(Request $request)
    {
        if (empty($request->idSt) || empty($request->name) || empty($request->email) || empty($request->password)) {
            return redirect()->back()->with('warning', 'All fields are required. Please fill in all the fields.');
        }
        
        $existingUser = User::where('idSt', $request->idSt)->first();

        if ($existingUser) {
            // Nếu tồn tại, hiển thị popup toastr
            return redirect()->back()->with('error', 'ID already exists. Please choose a different ID.');
        }

        $request->merge(['password' =>Hash::make($request->password)]);
        try {
            User::create($request->all());
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect()->route('login')->with('success', 'Registration successful!');
    }
    
    public function showLoginForm() 
    {
        return view('login');
    }
    // Handle a login request
    public function login(Request $request)
    {
        
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Lấy thông tin người dùng đã đăng nhập
            session(['idSt' => $user->idSt]);
            // Kiểm tra giá trị của trường 'role'
            if ($user->role == 0 || $user->role == 2) {
                // Nếu 'role' là 0, chuyển hướng đến trang leader
                return redirect('/leader')->with('success', 'Login as leader successfully');
            } elseif ($user->role == 1) {
                // Nếu 'role' là 1, chuyển hướng đến trang homepage
                return redirect('/')->with('success', 'Login as user successfully');
            } else {
            
            }
        }
    
        // Trường hợp không đăng nhập thành công
        return back()->with(['error' => 'Invalid Username or Password']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.index')->with('success', 'You have logged out successfully.');
    }
    
    
}
