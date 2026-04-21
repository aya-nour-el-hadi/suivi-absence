<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show()
    {
        return view('Login.show');
    }

    public function login(Request $request)
    {
       $values = ['email'=>$request->email , 'password'=>$request->password];

       if(Auth::Attempt($values))
        {
            $request->session()->regenerate();

            if(Auth()->user()->role == 'admin')
                {
                    return redirect()->route('dashboard.index');
                }
            else{
                    return redirect()->route('login.show');
                }
        }
        else{
            return to_route('login.show');
        }
    }
}
        
        