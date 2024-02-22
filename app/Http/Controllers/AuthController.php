<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
    {
        public function index(){
            return view('Auth.register');
        }
        public function register(Request $request){
           
            $valid = $request->validate([
                'username' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^\S*$/u'],
                "fullname" => 'nullable|string',
                "address" => 'nullable|string',
                "password" => 'required|string|min:6',
                "email" => 'required|unique:users',
    
            ]);
            $valid['password'] = bcrypt($valid['password']); 
            User::create($valid);
            return redirect('/login');
        }
        public function Login(Request $request){
           
            $valid = $request->validate([
                "password" => 'required|string|min:6',
                "email" => 'required|email',
    
            ]);
    if(Auth::attempt($valid)){
        $request->session()->regenerate();
     
        return redirect()->intended('/auth');
    }       
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
        }
        public function LoginView(){
            return view('Auth.login');
        }
    
    
        public function logout(Request $request)
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
