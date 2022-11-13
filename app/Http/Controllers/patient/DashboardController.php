<?php

namespace App\Http\Controllers\patient;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function dashboard()
    {
        try {
            return view("patient.content.dashboard");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function profile(User $user)
    {
        try {
            return view("patient.content.profile", compact("user"));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function profileUpdate(Request $request, User $user)
    {
        try {
            $user->update($request->except("password"));
            if ($request->password) {
                $user->update([
                    "password" => Hash::make($request->password),
                ]);
            }
            alert("Success", "Profile updated successfully.", "success");
            return redirect()->route("patient.dashboard");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function doctorList()
    {
        try {
            $doctors = Doctor::all();
            return view(
                "patient.content.appointment.doctorList",
                compact("doctors")
            );
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function pharmacyList()
    {
        try {
            $pharmacies = Pharmacy::all();
            return view("patient.content.pharmacy", compact("pharmacies"));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
