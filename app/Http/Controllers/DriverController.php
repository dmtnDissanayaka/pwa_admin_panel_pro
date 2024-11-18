<?php

namespace App\Http\Controllers;

// use App\Models\TblUser;
use App\Models\drivers;

use DataTables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    public function drivers_list(Request $request)
    {
        return view('drivers');
    }

    public function load_dricer_for_table(Request $request)
    {
        if ($request->search["value"]) {
            $keyword = $request->search["value"];
            $user_result = drivers::where(function ($query) use ($keyword) {
                $query->where('driver_first_name', "like", "%" . $keyword . "%")
                    ->orWhere('driver_last_name', "like", "%" . $keyword . "%");
            })->get();
        } else {
            $user_result = drivers::orderBy('id', 'desc')->limit(500)->get();
        }

        // dd($user_result);

        // dd($tblnarration[0]->getGroup->GroupName);
        if ($request->ajax()) {
            $allUserData = DataTables::of($user_result)
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-ID="' . $row->ID . '" data-original-title="View"
                class="btn btn-sm btn-warning viewuser" >View</a> &nbsp;';
                    return $btn;
                })
                ->make(true);
            return $allUserData;
        }
    }








}
