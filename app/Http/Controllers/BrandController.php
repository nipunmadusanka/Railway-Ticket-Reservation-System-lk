<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\brand;


class BrandController extends Controller
{
    // public function index()
    // {
    //     // return view('pages.brandPage.index');

    // }

    public function viewBrand()
    {
        return view('pages.brandPage.viewBrand');
    }

    public function add_brand(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'brandName' => 'required',
            //'status' => 'required'
        ]);

        $pro = new brand;
        $pro->brandName = $request->input('brandName');
        $pro->save();

        return redirect('/viewBrand')->with('success', 'Data saved');
    }

    public function show()
    {
        $showresult = DB::select('select * from brand where status = ?', ['enable']);
        return view('pages.brandPage.viewBrand', ['brand' => $showresult]);
    }

    public function destroy($id)
    {
        $disable = "disable";
        $results = DB::update('update brand set status = ? where brandID = ?', ['disable', $id]);

        // if ($results != false) {
        //     # code...
        //     return redirect('/viewBrand')->with('success', 'Delete Successfully');
        // } else {
        //     # code...
        //     return redirect('/viewBrand')->with('success', 'Error!! Not Deleted');
        // }
        return response()->json(['status' => " Delete Successfully" ]);
    }

    public function update(Request $request, $brandID)
    {
        $data = brand::find($brandID);
        $input = $request->all();
        $data->fill($input)->save();

        return redirect()->route('viewBrand');
    }
}
