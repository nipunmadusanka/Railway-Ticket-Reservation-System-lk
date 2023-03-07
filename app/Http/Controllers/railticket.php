<?php

namespace App\Http\Controllers;

use App\Models\userTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class railticket extends Controller
{
    public function index()
    {
        return view('pages.railTicket.railTicket');

    }
    public function add(Request $request)
    {
        $myID = Auth::id();
        // dd($request);
        $this->validate($request, [
            'from' => 'required',
            'to' => 'required',
            'children' => 'required',
            'adult' => 'required',
        ]);

        $pro = new userTicket();

        $pro->UserID = $myID;
        $pro->from = $request->input('from');
        $pro->to = $request->input('to');
        $pro->children = $request->input('children');
        $pro->adult = $request->input('adult');

        $pro->save();

        return redirect('/dashboard')->with('success', 'Data Aded');
    }
    public function confirmticket()
    {
        $showresult = DB::table('user_tickets')
        ->join('users', 'user_tickets.userID', '=', 'users.id')
        ->select('user_tickets.*', 'users.name')
        ->where('user_tickets.status', '=', 'confirm')
        ->get();
        // $showresult = DB::select('select * from user_tickets where status = ?', ['enable']);
        return view('pages.productPage.viewconfirmticket', ['product' => $showresult]);

    }
    // public function showtable()
    // {
    //     $raildata = DB::select('select * from user_tickets where status = ?', ['enable']);
    //     return view('pages.railTicket.railTicket', ['raildata' => $raildata]);

    // }

}
