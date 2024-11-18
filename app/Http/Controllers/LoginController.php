<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\TblUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{
    protected $maxAttempts = 3; // Default is 5
    protected $decayMinutes = 2; // Default is 1
    public function first()
    {
        $company_details = DB::table('tbl_jcr')->first();
        // dd($company_details);
        return view("auth.landing", compact('company_details'));
    }
    public function index()
    {
        return view("auth.login");
    }

    public function login(LoginRequest $request)
    {
        $email = $request->input("email");
        $password = $request->input("password");

        $user = TblUser::where('email', $email)->first();

        $executed = RateLimiter::attempt(
            'login-user:'.$email,
            3,
            function ()  {
            },$decaySeconds=100
        );

        if (!$executed) {
            $seconds = RateLimiter::availableIn( 'login-user:'.$email,);
            return back()->with('error', 'Too many login attempts! Please try again in <span class="timer">'.$seconds.'</span> second');
        }

        if ($user) {

            $passwordHash = Hash::check($password, $user->password);

            if ($passwordHash) {
                Auth::login($user);
                return redirect()->route('order_list');
            } else {

                return back()->with('error', 'Email or Password does not match');
            }
        } else {

            return back()->with('error', 'Email or Password does not match');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function get_ant_logo(Request $request)
    {
        $ant_logo = TblAntLogo::first();
        return view("auth.login", compact('ant_logo'));
    }
}
