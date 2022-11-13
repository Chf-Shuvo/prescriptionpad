<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Pharmacy;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("guest")->except("logout");
        $this->middleware("guest:admin")->except("logout");
        $this->middleware("guest:doctor")->except("logout");
        $this->middleware("guest:pharmacy")->except("logout");
    }

    public function logout()
    {
        try {
            // return auth()->user();
            Auth::logout();
            session()->flush();
            alert()->success("Success", "User logged out successfully");
            return redirect()->route("login");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function sendPasswordResetLink(Request $request, $user_type)
    {
        try {
            $details = [
                "user_type" => $user_type,
                "email" => $request->email,
            ];
            Mail::to($details["email"])->send(new ResetPasswordMail($details));
            alert(
                "Password Reset Link Sent",
                "A link has been sent to your mail, please check.",
                "success"
            );
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function setPassword($user_type, $user_email)
    {
        try {
            return view("passwordUpdate", compact("user_type", "user_email"));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function passwordUpdate(Request $request)
    {
        try {
            if ($request->user_type == "patient") {
                User::where("email", $request->user_email)->update([
                    "password" => Hash::make($request->password),
                ]);
                alert(
                    "Updated",
                    "Password updated successfully, please login using your new password",
                    "success"
                );
                return redirect()->route("login");
            } elseif ($request->user_type == "doctor") {
                Doctor::where("email", $request->user_email)->update([
                    "password" => Hash::make($request->password),
                ]);
                alert(
                    "Updated",
                    "Password updated successfully, please login using your new password",
                    "success"
                );
                return redirect()->route("doctor.login");
            } elseif ($request->user_type == "pharmacy") {
                Pharmacy::where("email", $request->user_email)->update([
                    "password" => Hash::make($request->password),
                ]);
                alert(
                    "Updated",
                    "Password updated successfully, please login using your new password",
                    "success"
                );
                return redirect()->route("pharmacy.login");
            } else {
                Admin::where("email", $request->user_email)->update([
                    "password" => Hash::make($request->password),
                ]);
                alert(
                    "Updated",
                    "Password updated successfully, please login using your new password",
                    "success"
                );
                return redirect()->route("admin.login");
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
