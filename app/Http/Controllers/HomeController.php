<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller

{
    // public function AdminAuthCheck()
    // {
    //     $admin_id = Session::get('admin_id');
    //     if ($admin_id) {
    //         return view ('pages.home.index');
    //     } else {
    //         return Redirect::to('/')->send();
    //     }
    // }

    // public function index()
    // {
    //     $this->AdminAuthCheck();
    //     return view ('pages.home.index');
    // }

    function index()
    {
        if(Auth::check())
        {
            return view('pages.railTicket.railTicket');
        }

        return redirect('/')->with('success', 'you are not allowed to access');
    }

    // public function logout()
    // {
    //    Session::put('admin_name', null);
    //    Session::put('admin_id', null);
    //     Session::flush();

    //     Auth::logout();

    //     return Redirect::to('/');
    // }

}
