<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inventory extends Controller
{
    public function viewInventory()
    {
        return view('pages.inventory.viewInventory');
    }
}
