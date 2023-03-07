<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GdnController extends Controller
{
    public function index()
    {
        return view('pages.gdnPage.viewGdn');
    }

    public function addGdn()
    {
        return view('pages.gdnPage.addGdn');
    }


    public function showaddgdn()                                            //get data from foreign key
    {
        $showlocation = DB::select('select * from location where status = ?', ['enable']);
        $location = DB::select('select * from location where status = ?', ['enable']);
        return view('pages.gdnPage.addGdn', ['showlocation' => $showlocation, 'location' => $location]);


// }
}
}
