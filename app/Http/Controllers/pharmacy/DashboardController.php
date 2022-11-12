<?php

namespace App\Http\Controllers\pharmacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        try {
            return view("pharmacy.content.dashboard");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
