<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        // dd($request->remember);
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if(!Auth::attempt($request->only('email','password'),$request->remember)){
            return back()->with('status','Login Details does not match');
        }

        return redirect()->route('dashboard');
    }
}
