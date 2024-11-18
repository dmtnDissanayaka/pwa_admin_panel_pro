<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('index');
    }


}
