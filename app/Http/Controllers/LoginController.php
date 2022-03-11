<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            
            $request->session()->regenerate();

            // Mengambil role dari user yang login
            return redirect('/admin');
        }else{
            return abort('404');
        }
        
    }

}
