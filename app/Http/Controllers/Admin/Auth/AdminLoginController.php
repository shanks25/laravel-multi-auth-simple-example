<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login')	 ;
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ], ['email.required'=>'The email id field is required']);

        $admin = Admin::where(['email' => $request->email])->first();
    
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            Auth::guard('admin')->loginUsingId($admin->id);
            $user =        Auth::guard('admin')->user();
            
            return redirect('admin/dashboard');
        }
       
        return back()->with('unsuccess', 'Invalid Email ID or Password');
    }


    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }


    public function logout()
    {
        session()->forget('superadmin');
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
