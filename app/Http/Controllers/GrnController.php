<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\grn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\location;
use Illuminate\Console\View\Components\Alert;

class GrnController extends Controller
{
    public function index()
    {
        return view('pages.grnPage.index');
    }
    public function viewGrn()
    {
        return view('pages.grnPage.viewGrn');
    }


    public function addGrn()
    {
        return view('pages.grnPage.addGrn');
    }



    public function add_grn(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'SupplierID' => 'required',
            'locationID' => 'required',
        ]);
        $id = Auth::id();
        $pro = new grn;


        $pro->SupplierID = $request->input('SupplierID');
        $pro->userID = $id;
        $pro->locationID = $request->input('locationID');
        $pro->note = $request->input('note');
        $pro->save();

        return redirect('/viewGrn')->with('success', 'Data saved');
    }

    public function add(Request $request)
    {
        $userData = collect(json_decode($request->get('json')))
        ->collapse()->all();

        foreach ($userData as $area)
            {
            $id = Auth::id();
            $pro = new grn;


                // dd("jh");

            $pro->SupplierID = 1;
            $pro->userID = $id;
            $pro->locationID = 4;
            $pro->note = $area[0];
            $pro->save();
        // this is your area from json response
            }

        // for ($i = 0 ; $i < count($files['name']); $i++) {
        //     echo $files['name'][$i].'<br/>';
        // }

        // $datee = $request->input('title');
        // $id = Auth::id();
        // grn::create([
        //     'SupplierID' => 3,
        //     'userID' => $id,
        //     'locationID' => 1,
        //     'note' => $datee
        // ]);


        // $id = Auth::id();
        // $object = json_decode($request -> itemList);
        // $id = Auth::id();
        // $pro = new grn;


            // dd("jh");

        // $pro->SupplierID = 1;
        // $pro->userID = $id;
        // $pro->locationID = 4;
        // $pro->note = $request->input('item.brand');
        // $pro->save();

        // foreach ($data as $key => $value) {

        // }

        // foreach ($object->item as $prodc) {
        //     var_dump($prodc->qty);
        //  }

        // $object = $request -> item;
        // foreach ($object as $value) {
        //     foreach ($value as $val) {
        //         $datee = $val;
        //     }
        // }

        // $object = $request -> item;
        // $hh = "kkk";
        // foreach ($request as $value) {

        //         $datee = $value['qty'];
        // }

        $datee = "j";
            // echo "yy";
            // $datee = $request->input('item.brand');

        return response()->json(['success' => $datee ]);
    }

    public function show()
    {
        $showgrn = DB::table('grn')
            ->join('supplier', 'grn.SupplierID', '=', 'supplier.supplierID')
            ->join('users', 'grn.userID', '=', 'users.id')
            ->join('location', 'grn.locationID', '=', 'location.locationID')
            ->select('grn.*', 'supplier.supplierName', 'users.name', 'location.locationName')
            ->where('grn.status', '=', 'enable')
            ->get();
        $showlocation = DB::select('select * from location where status = ?', ['enable']);
        $showsupplier = DB::select('select * from supplier where status = ?', ['enable']);
        $showlocation = DB::select('select * from location where status = ?', ['enable']);
        $showproduct = DB::select('select * from products where status = ?', ['enable']);

        return view('pages.grnPage.viewGrn', ['grn' => $showgrn, 'location' => $showlocation, 'supplier' => $showsupplier, 'product' => $showproduct]);
    }

    public function showaddgrn()
    {
        $showproduct = DB::select('select * from products where status = ?', ['enable']);
        $showsupplier = DB::select('select * from supplier where status = ?', ['enable']);
        $showlocation = DB::select('select * from location where status = ?', ['enable']);
        $showbrand = DB::select('select * from brand where status = ?', ['enable']);
        return view('pages.grnPage.addGrn', ['product' => $showproduct, 'showsupplier' => $showsupplier, 'brand' => $showbrand, 'location' => $showlocation]);

    }
    public function destroy($id)
    {
        $disable = "disable";
        $results = DB::update('update grn set status = ? where id = ?', ['disable', $id]);

        if ($results != false) {
            # code...
            return redirect('/viewGrn')->with('success', 'Delete Successfully');
        } else {
            # code...
            return redirect('/viewGrn')->with('success', 'Error!! Not Deleted');
        }
    }

    public function update(Request $request, $id)
    {
        $data = grn::find($id);
        $input = $request->all();
        $data->fill($input)->save();

        return redirect()->route('viewGrn');
    }

    public function autocompleteSearch(Request $request)
    {
        $query = $request->get('query');
        $filterResult = brand::where('brandName', 'LIKE', '%' . $query . '%')->get();
        return response()->json($filterResult);
    }
}
