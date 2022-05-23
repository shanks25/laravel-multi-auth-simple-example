<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminProfileController extends Controller
{
    public function index()
    {
        Auth::guard('admin')->user();
        
        return view('admin.home') ;
    }

    public function __construct()
    {
        $this->middleware('admin.auth');
    }
}
