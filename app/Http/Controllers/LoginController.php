<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //validate_login
    public function index()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('pages.login.index');
    }
    // public function validate_login(Request $request)
    // {
    //     $email = $request->email;
    //     // $pass = md5($request->password);
    //     $pass = $request->password;

    //     $results = DB::table('users')
    //         ->where('email', $email)
    //         ->where('password', $pass)
    //         ->first();
    //     if ($results) {
    //         Session::put('admin_name', $results->name);
    //         Session::put('admin_id', $results->id);
    //         // Session::put('message', 'super');
    //         return Redirect::to('/dashboard');
    //     } else {
    //         Session::put('message', 'Email or Password Invalid');
    //         return Redirect::to('/');
    //     }
    // }

    function validate_login(Request $request)
    {
        $request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials))
        {
            return redirect('/dashboard');
        }

        return redirect('/')->with('success', 'Your Login details are not Valid');
    }
}
