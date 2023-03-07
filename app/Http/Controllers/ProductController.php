<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\viewProducts;
use App\Models\userTicket;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.productPage.index');

    }

    public function viewProducts()
    {
        return view('pages.productPage.viewProducts');
    }
    public function traintime()
    {
        $showresult = DB::select('select * from tarintimes where status = ?', ['enable']);
        return view('pages.traintime.traintime', ['showresult' => $showresult]);
    }

    public function showtable()
    {
        $showresult = DB::table('user_tickets')
        ->join('users', 'user_tickets.userID', '=', 'users.id')
        ->select('user_tickets.*', 'users.name')
        ->where('user_tickets.status', '=', 'enable')
        ->get();
        // $showresult = DB::select('select * from user_tickets where status = ?', ['enable']);
        return view('pages.productPage.viewProducts', ['product' => $showresult]);

    }

    public function cancelticket()
    {
        $showresult = DB::table('user_tickets')
        ->join('users', 'user_tickets.userID', '=', 'users.id')
        ->select('user_tickets.*', 'users.name')
        ->where('user_tickets.status', '=', 'cancel')
        ->get();
        // $showresult = DB::select('select * from user_tickets where status = ?', ['enable']);
        return view('pages.productPage.viewcancelticket', ['product' => $showresult]);

    }

    public function update(Request $request, $id)
    {
        $data = userTicket::find($id);
        $input = $request->all();
        $data->fill($input)->save();

        return redirect()->route('viewproducts');
    }

    public function destroy($id)
    {
        $results = DB::update('update user_tickets set status = ? where id = ?', ['cancel', $id]);

        return response()->json(['status' => " Cancel Successfully" ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'proName' => 'required',
            'unitName' => 'required',
            'Description' => 'required',
        ]);

        $pro = new product;


        $pro->ProductName = $request->input('proName');
        $pro->UnitName = $request->input('unitName');
        $pro->Description = $request->input('Description');

        $pro->save();

        return redirect('/viewProducts')->with('success', 'Data saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function view(product $product)
    {
        return view('view', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }
}
