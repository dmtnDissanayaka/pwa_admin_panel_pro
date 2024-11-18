<?php

namespace App\Http\Controllers;

// use App\Models\TblUser;
use App\Models\companies;

use DataTables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function company_list(Request $request)
    {
        return view('company');
    }

    public function load_company_for_table(Request $request)
    {
        if ($request->search["value"]) {
            $keyword = $request->search["value"];
            $user_result = companies::where(function ($query) use ($keyword) {
                $query->where('company_name', "like", "%" . $keyword . "%")
                    ->orWhere('email',  $keyword);
            })->get();
        } else {
            $user_result = companies::orderBy('id', 'desc')->get();
        }



        // dd($tblnarration[0]->getGroup->GroupName);
        if ($request->ajax()) {
            $allUserData = DataTables::of($user_result)
                // ->addColumn('action', function ($row) {
                //     $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-ID="' . $row->ID . '" data-original-title="View"
                // class="btn btn-sm btn-warning viewuser" >View</a> &nbsp;';
                //     return $btn;
                // })
                ->make(true);
            return $allUserData;
        }
    }


    public function user_create(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'userEmail' => 'required',
                'userPwd' => 'required',
                'userConPwd' => 'required',

            ]);

            if (!$validator->passes()) {
                return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
            } else {

                $username = $request->input('username');
                $email = $request->input('userEmail');
                $pwd = Hash::make($request->input('userPwd'));
                $conpwd = Hash::make($request->input('userConPwd'));

                //create User
                $user = new TblUser();
                $user->username = $username;
                $user->email = $email;
                $user->password = $pwd;
                $user->confirmpassword = $conpwd;
                $user->is_delete = 0;
                $user->save();

                // //user log
                // $action = "Create new user, Username : $username, User ID : $user->id";
                // $request =$request;
                // $userlog = (new UserLog)->user_log_entry($action , $request);

            }



            DB::commit();
            return response()->json(["success" => true, "message" => "User Create Successfully!"]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["success" => false, "message" => $e->getMessage()]);
        }
    }

    //user_update
    public function user_update(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'userEmail' => 'required',
                // 'userMobile' => 'required',

            ]);

            if (!$validator->passes()) {
                return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
            } else {

                // get inputs from request
                $user_id = $request->input('userId');
                $username = $request->input('username');
                $email = $request->input('userEmail');
                $userPwd = $request->input('userPwd');
                $userConPwd = $request->input('userConPwd');

                // dd($username);

                //Update User
                $user = TblUser::where("id", $user_id)->first();
                $user->username = $username;
                $user->email = $email;
                $user->password = $userPwd;
                $user->confirmpassword = $userConPwd;
                $user->save();
                //

                // //user log
                // $action = "Update user data, User ID : $user_id";
                // $request =$request;
                // $userlog = (new UserLog)->user_log_entry($action , $request);

            }



            DB::commit();
            return response()->json(["success" => true, "message" => "Updated!"]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["success" => false, "message" => $e->getMessage()]);
        }
    }

    // User Delete
    public function user_delete(Request $request,$id)
    {
        $del_user = TblUser::where("id", $id)->first();

        $del_user->is_delete = "1";
        $del_user->save();

        return response()->json(["success" => true, "message" => "User Deleted Successfully"]);
    }


    public function drivers_list(Request $request)
    {
        return view('drivers');
    }


}
