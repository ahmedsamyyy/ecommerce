<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('dashboard.auth.login');
    }
    public function postlogin( LoginRequest $request){
        $remember_me=$request->has('remeber_me')?true:false;
        if (auth()->guard('admin')->attempt(['email'=>$request->input('email'),
        'password'=>$request->input('password')],$remember_me)) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with(['error'=>'البريد الإلكتروني أوالرقم السري خطأ']);
    }
    public function logout(){
        auth('admin')->logout();
        return redirect()->route('adminlogin');
    }
}
