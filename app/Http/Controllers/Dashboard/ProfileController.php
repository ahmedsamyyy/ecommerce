<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function editprofile(){
        $admin=Admin::find(auth('admin')->user()->id);
        return view('dashboard.profile.edit',compact('admin'));
    }
    public function updateprofile(ProfileRequest $request){
        try {
            $admin=Admin::find(auth('admin')->user()->id);
        $admin->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),

        ]);
        return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'خطأ في البيانات ']);
        }
    }
}
