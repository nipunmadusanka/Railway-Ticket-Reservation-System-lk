<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\location;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('pages.locationPage.index');

    }

    public function viewlocation()
    {
        return view('pages.locationPage.viewLocation');
    }

    public function viewDetailsPage($id)
    {
        return view('pages.locationPage.viewLocationDetails');
    }

    public function viewDetails($id)
    {
        $locationdata = DB::table('location')
        ->join('location_type', 'location.locationTypeID', '=', 'location_type.locationTypeID')
        ->select('location.*', 'location_type.locationTypeName')
        ->where('location.locationID', $id)
        ->get();
        $grndata = DB::table('grn')
        ->join('supplier', 'grn.supplierID', '=', 'supplier.supplierID')
        ->join('users', 'grn.userID', '=', 'users.id')
        ->select('grn.*', 'supplier.supplierName', 'supplier.phoneNumber', 'users.name')
        ->where('grn.locationID', $id)
        ->get();
        return view('pages.locationPage.viewLocationDetails', ['location' => $locationdata, 'grndata' => $grndata]);
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
    { {
            // dd($request);
            $this->validate($request, [
                'locName' => 'required',
                'locationTypeID' => 'required',
                //'status' => 'required'
            ]);

            $pro = new location;


            $pro->LocationName = $request->input('locName');
            $pro->LocationTypeID = $request->input('locationTypeID');

            $pro->save();

            return redirect('/viewLocation')->with('success', 'Data saved');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $showresult = DB::select('select * from location where status = ?', ['enable']);
        $showlocationtype = DB::select('select * from location_type where status = ?', ['enable']);

        $showresult = DB::table('location')
        ->join('location_type', 'location.locationTypeID', '=', 'location_type.locationTypeID')
        ->select('location.*', 'location_type.locationTypeName')
        ->where('location.status', '=', 'enable')
        ->get();
        return view('pages.locationPage.viewLocation', ['location' => $showresult, 'locationtype' => $showlocationtype]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locationdata = DB::table('location')->where('locationID', $id)->first();
        return view('pages.locationPage.viewLocation', compact('locationdata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = location::find($id);
        $input = $request->all();
        $data->fill($input)->save();

        return redirect()->route('viewLocation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disable = "disable";
        $results = DB::update('update location set status = ? where locationID = ?', ['disable', $id]);

        // if ($results != false) {
        //     # code...
        //     return redirect('/viewLocation')->with('success', 'Delete Successfully');
        // } else {
        //     # code...
        //     return redirect('/viewLocation')->with('success', 'Error!! Not Deleted');
        // }
        return response()->json(['status' => " Delete Successfully" ]);

    }
}
