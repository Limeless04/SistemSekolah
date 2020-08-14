<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
     /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email','password');

        if (Auth::guard('headmaster')->attempt($credentials)) {
            // Authentication passed...
            return redirect('/kepsek');
        }elseif(Auth::guard('teacher')->attempt($credentials)){
            // Authentication passed...
            return redirect('/guru');
        }elseif(Auth::guard('student')->attempt($credentials)){
            // Authentication passed...
            return redirect('/siswa');
        }
        else{
            return redirect('/login')->with('pesan','email dan username tidak ditemukan');
        }
    }

        public function login(){
        return view('layouts.login');
    }

    public function logout(){
        if (Auth::guard('headmaster')->check()) {
            Auth::guard('headmaster')->logout();
          } elseif (Auth::guard('teacher')->check()) {
            Auth::guard('teacher')->logout();
          }elseif(Auth::guard('student')->check()){
              Auth::guard('student')->logout();
          }
      
          return redirect('/');
    }
}
