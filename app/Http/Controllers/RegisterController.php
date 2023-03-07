<?php

namespace App\Http\Controllers;

use App\Models\locUser;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller



{
    public function index()
    {
        return view('pages.registration.index');
    }

    public function viewDetails()
    {
        return view('pages.registration.viewDetails');
    }



    public function showtype()
    {
        $resultsusertype = DB::select('select * from user_type where status = ?', ['enable']);
        $resultslocationtype = DB::select('select * from location where status = ?', ['enable']);
        $resuluser = DB::select('select * from users where status = ?', ['enable']);
        return view('pages.registration.index', ['resultslocationtype' => $resultslocationtype, 'resultsuser' => $resuluser, 'usertype' => $resultsusertype]);
    }
    function user_registration(Request $request)
    {
        $request->validate([
            'userTypeID'         =>   'required',
            'locationID'         =>   'required',
            'name'         =>   'required',
            'email'        =>   'required|email|unique:users',
            'phoneNumber'         =>   'required',
            'address'         =>   'required',
            'password'     =>   'required|min:8|confirmed',
        ]);

        $data = $request->all();

        User::create([
            'userTypeID'  =>  $data['userTypeID'],
            'locationID' =>  $data['locationID'],
            'name'  =>  $data['name'],
            'email' =>  $data['email'],
            'phoneNumber'  =>  $data['phoneNumber'],
            'address' =>  $data['address'],
            'password' => Hash::make($data['password'])

        ]);

        $location = $data['locationIDs'];
        $ll = array_values($location);
        for ($i=0; $i < count($ll); $i++) {
            $pro = new locUser;

            $pro->userID = 1;
            $pro->locationID = $ll[$i];

            $pro->save();
        }

        return redirect('/registration/adduser')->with('success', 'Registration Completed');
    }
    public function update(Request $request, $id)
    {
        $data = User::find($id);
        $input = $request->all();
        $data->fill($input)->save();

        return redirect()->route('registration');
    }

    public function destroy($id)
    {
        $disable = "disable";
        $results = DB::update('update users set status = ? where id = ?', ['disable', $id]);

        if ($results != false) {
            # code...
            return redirect('/registration')->with('success', 'Delete Successfully');
        } else {
            # code...
            return redirect('/registration')->with('success', 'Error!! Not Deleted');
        }
    }
}
