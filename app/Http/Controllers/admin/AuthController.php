<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
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
            return view("admin.auth.login");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function attemptLogin(Request $request)
    {
        try {
            // return $request;
            $admin = Admin::where("email", $request->email)->first();
            if ($admin && Hash::check($request->password, $admin->password)) {
                Auth::guard("admin")->loginUsingId($admin->id);
                return redirect()->intended(route("admin.dashboard"));
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
            Auth::guard("admin")->logout();
            session()->flush();
            alert()->success("Success", "Admin logged out successfully");
            return redirect()->route("admin.login");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
