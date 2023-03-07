<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LogoutControler extends Controller
{
    function index()
    {
        Session::flush();

        Auth::logout();

        return Redirect('/');
    }
    
}
