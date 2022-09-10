<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function loginPage(){
        return view('admin.auth.login');
    }
    public function login(Request $request){
        $validate=$request->validate([
            'email'=>'required|email',
            'password'=>'required|string|min:5'
        ]);
        $credential=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($credential, $request->filled('remember'))){
            $request->session()->regenerate();
            return redirect()->route('admin-dashboard')->with('success', 'You are Successfully Loged-in..!!');
        }
        return back()->withErrors([
            'email'=>'Wrong Credentials Found'
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('authorized.login');
    }
}
