<?php

namespace App\Http\Controllers;

use App\Models\TblUser;

use DataTables;
use DB;
use Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\CustomerListExport;
use App\Exports\VendersListExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function user_list(Request $request)
    {
        return view('userAndMgt');
    }

    public function load_super_admin_users(Request $request)
    {
        if ($request->search["value"]) {
            $keyword = $request->search["value"];
            $user_result = TblUser::where(function ($query) use ($keyword) {
                $query->where('username', "like", "%" . $keyword . "%")
                    ->orWhere('email',  $keyword);
            })->get();
        } else {
            $user_result = TblUser::orderBy('id', 'desc')->get();
        }


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

                $check_email = TblUser::where('email',$email)->first();
                if($check_email){
                    throw new \Exception("Already created user account under this email");
                }

                //create User
                $user = new TblUser();
                $user->username = $username;
                $user->email = $email;
                $user->password = $pwd;
                $user->confirmpassword = $conpwd;
                $user->is_delete = 0;
                $user->save();

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

            ]);

            if (!$validator->passes()) {
                return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
            } else {

                // get inputs from request
                $user_id = $request->input('userId');
                $username = $request->input('username');
                $email = $request->input('userEmail');
                $userPwd = Hash::make($request->input('userPwd'));
                $userConPwd = Hash::make($request->input('userConPwd'));

                //Update User
                $user = TblUser::where("id", $user_id)->first();
                $user->username = $username;
                $user->email = $email;
                $user->password = $userPwd;
                $user->confirmpassword = $userConPwd;
                $user->save();

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

        // //user log
        // $action = "Delete user, Username: $username, User ID : $id";
        // $request =$request;
        // $userlog = (new UserLog)->user_log_entry($action , $request);

        $del_user->is_delete = "1";
        $del_user->save();

        return response()->json(["success" => true, "message" => "User Deleted Successfully"]);
    }


}
