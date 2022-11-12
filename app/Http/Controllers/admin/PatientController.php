<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    public function index()
    {
        try {
            $patients = User::all();
            return view("admin.content.patient.index", compact("patients"));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function store(Request $request)
    {
        try {
            // return $request;
            $patient = User::create($request->all());
            $patient->update([
                "password" => Hash::make($request->password),
            ]);
            alert()->success(
                "Success",
                "Patient added to the list successfully."
            );
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function edit(User $user)
    {
        try {
            return view("admin.content.patient.edit", compact("user"));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update(Request $request, User $user)
    {
        try {
            $user->update($request->except("password"));
            if ($request->password) {
                $user->update([
                    "password" => Hash::make($request->password),
                ]);
            }
            alert(
                "Success",
                "Patient information updated successfully.",
                "success"
            );
            return redirect()->route("admin.patient.index");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
