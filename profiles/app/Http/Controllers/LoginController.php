<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show(){
        return view('login.showLogin');
    }
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $credentials = ['email' => $email, 'password' => $password];
         //dd($credentials);
        if (Auth::attempt($credentials)) {
          $request->session()->regenerate();
            return to_route('homePage.index')->with('success', 'Vous êtes bien connecté.');
        } else {
            return back()->withErrors([
                'email' => 'Email ou mot de passe incorrect.'
            ])->onlyInput('email');
        }
    }
    public function logout(){
             Session::flush();
              Auth::logout();
              return to_route('login')->with('success', 'Vous êtes bien deconnecté.');
    }
  

    }

