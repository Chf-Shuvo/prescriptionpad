<?php

namespace App\Http\Controllers\doctor;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest")->except("logout");
        $this->middleware("guest:admin")->except("logout");
        $this->middleware("guest:doctor")->except("logout");
        $this->middleware("guest:pharmacy")->except("logout");
    }

    public function showLoginForm()
    {
        try {
            return view("doctor.auth.login");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function attemptLogin(Request $request)
    {
        try {
            // return $request;
            $doctor = Doctor::where("email", $request->email)->first();
            if ($doctor && Hash::check($request->password, $doctor->password)) {
                Auth::guard("doctor")->loginUsingId($doctor->id);
                return redirect()->intended(route("doctor.dashboard"));
            }
            alert()->error(
                "Invalid Credentials",
                "Please try with correct login credentials"
            );
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function logout()
    {
        try {
            // return auth("admin")->user();
            Auth::guard("doctor")->logout();
            session()->flush();
            alert()->success("Success", "Doctor logged out successfully");
            return redirect()->route("doctor.login");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
