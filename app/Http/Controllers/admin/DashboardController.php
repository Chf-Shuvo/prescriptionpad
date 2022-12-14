<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        try {
            return view("admin.content.dashboard");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
