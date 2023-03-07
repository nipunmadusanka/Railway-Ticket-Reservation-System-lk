<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuppliersController extends Controller
{
    public function index()
    {
        return view('pages.suppliersPage.index');
    }


    public function viewSupplier()
    {
        return view('pages.suppliersPage.viewSupplier');
    }

    public function viewDetails($id)
    {
        // $supplierData = DB::delete('select * from supplier where supplierID = ?',[$id]);
        // $locationdata = DB::table('location')
        // ->join('location_type', 'location.locationTypeID', '=', 'location_type.locationTypeID')
        // ->select('location.*', 'location_type.locationTypeName')
        // ->where('location.locationID', $id)
        // ->get();
        $supplierdata = DB::table('supplier')->where('supplierID', $id)->first();
        $grndata = DB::table('grn')
        ->join('supplier', 'grn.supplierID', '=', 'supplier.supplierID')
        ->join('users', 'grn.userID', '=', 'users.id')
        ->select('grn.*', 'supplier.supplierName', 'users.name')
        ->where('grn.supplierID', $id)
        ->get();
        return view('pages.suppliersPage.viewSupplierDetails', ['grnData' => $grndata, 'supplierData' => $supplierdata]);
    }

    public function add_supplier(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'supplierName' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required',
            'email' => 'required',
        ]);

        $pro = new supplier;


        $pro->supplierName = $request->input('supplierName');
        $pro->phoneNumber = $request->input('phoneNumber');
        $pro->address = $request->input('address');
        $pro->email = $request->input('email');

        $pro->save();

        return redirect('/viewSupplier')->with('success', 'Data saved');
    }

    public function show()
    {

        $showresult = DB::select('select * from supplier where status = ?', ['enable']);
        return view('pages.suppliersPage.viewSupplier', ['supplier' => $showresult]);
    }

    public function update(Request $request, $supplierID)
    {
        $data = supplier::find($supplierID);
        $input = $request->all();
        $data->fill($input)->save();

        return redirect()->route('viewSupplier');
    }
    public function destroy($id)
    {
        DB::delete('delete from supplier where id = ?',[$id]);

        return response()->json(['status' => " Delete Successfully" ]);
        // if ($results != false) {
        //     # code...
        //     return redirect('/viewProducts')->with('success', 'Delete Successfully');
        // } else {
        //     # code...
        //     return redirect('/viewProducts')->with('success', 'Error!! Not Deleted');
        // }
    }
}
