<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
}
