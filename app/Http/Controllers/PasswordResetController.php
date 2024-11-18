<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\EmailVerificationCode;
use App\Models\TblEmailVerification;
use App\Models\TblUser;

use Carbon\Carbon;
use DB;

class PasswordResetController extends Controller
{
    //get order list page
    public function user_password_reset(Request $request)
    {
        return view('password_reset.password_reset');
    }

    public function pw_reset_email(LoginRequest $request)
    {

        try {
            DB::beginTransaction();

        $validator = Validator::make($request->all(), [
            'email' => 'required',

        ]);
        if (!$validator->passes()) {
            // return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
            return back()->with('error', 'Please enter email');

        } else {

                $InputEmail = $request->input("email");

                $addNewRow = new TblEmailVerification();
                $addNewRow->Email = $InputEmail;
                $addNewRow->OTP = rand(123456, 999999);
                $addNewRow->Expire_at = Carbon::now()->addMinutes(1140);
                $addNewRow->save();

                $otpSentEmail =$InputEmail;

                // dd($addNewRow);

                session(['otpSentEmail' => $otpSentEmail]);

                $staffEmailData = [
                    'password' => $addNewRow->OTP,
                    'subject' => 'Confirm Email Address',
                    'message' => 'Confirm your email address',
                ];
                Mail::to($otpSentEmail)->send(new EmailVerificationCode($staffEmailData));

                return redirect()->route('verify_email');
            }

                DB::commit();
                return response()->json(["success" => true, "message" => "!"]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["success" => false, "message" => $e->getMessage()]);
            // return response()->json(["success" => false, "message" => "Invalid Data Issue!"]);
        }

    }

    public function verify_email()
    {
        return view("auth.verify");
    }

    public function resendEmail(LoginRequest $request)
    {

        try {
            DB::beginTransaction();

                $InputEmail = $request->input("email");



                $addNewRow = new TblEmailVerification();
                $addNewRow->Email = $InputEmail;
                $addNewRow->OTP = rand(123456, 999999);
                $addNewRow->Expire_at = Carbon::now()->addMinutes(1140);
                $addNewRow->save();

                $otpSentEmail =$InputEmail;



                session(['otpSentEmail' => $otpSentEmail]);

                $staffEmailData = [
                    // 'name' => $NewStakeholder->Name,
                    // 'email' => $otpSentEmail,
                    'password' => $addNewRow->OTP,
                    'subject' => 'Confirm Email Address',
                    'message' => 'Confirm your email address',
                ];
                Mail::to($otpSentEmail)->send(new EmailVerificationCode($staffEmailData));

                DB::commit();
                return response()->json(["success" => true, "message" => "!"]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["success" => false, "message" => $e->getMessage()]);
            // return response()->json(["success" => false, "message" => "Invalid Data Issue!"]);
        }


    }

    public function checkOTP(LoginRequest $request)
    {

        try {
            DB::beginTransaction();

                $Email = $request->input("otpSentEmail");

                // dd($Email);

                $digit1 = $request->input("digit1-input");

                $combinedNumber = $digit1;

                if(!$combinedNumber){
                    return back()->with('error', 'Please enter code.');
                }

                // Convert the combined string to an integer if needed
                $combinedNumber = (int)$combinedNumber;
                #Validation Logic
                $verificationCode = TblEmailVerification::where('Email', $Email)
                ->orderBy('Id', 'desc') // Sort by Id column in descending order
                ->first();

                // dd($combinedNumber);


                if($verificationCode->OTP == $combinedNumber){
                    $verificationCode->Verified = 1;
                    $verificationCode->save();
                    return redirect()->route('new_password');
                }else{
                    return back()->with('error', 'Your code has been expired');
                }

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["success" => false, "message" => $e->getMessage()]);
            // return response()->json(["success" => false, "message" => "Invalid Data Issue!"]);
        }


    }
    public function new_password(Request $request)
    {
        return view('auth.new_password');
    }


    public function reset_password(LoginRequest $request)
    {

        try {
            DB::beginTransaction();

                $Email = $request->input("otpSentEmail");
                $password = Hash::make($request->input('password'));
                $conpassword = Hash::make($request->input('conpassword'));

                $update_pw = TblUser::where('email', $Email)->first();
                $update_pw->password = $password;
                $update_pw->confirmpassword = $conpassword;
                $update_pw->save();

                    return redirect()->route('login');

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["success" => false, "message" => $e->getMessage()]);
            // return response()->json(["success" => false, "message" => "Invalid Data Issue!"]);
        }


    }

    

}
