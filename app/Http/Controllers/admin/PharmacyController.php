<?php

namespace App\Http\Controllers\admin;

use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PharmacyController extends Controller
{
    public function index()
    {
        try {
            $pharmacies = Pharmacy::all();
            return view("admin.content.pharmacy.index", compact("pharmacies"));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function store(Request $request)
    {
        try {
            // return $request;
            $pharmacy = Pharmacy::create($request->all());
            $pharmacy->update([
                "password" => Hash::make($request->password),
            ]);
            alert()->success(
                "Success",
                "Pharmacy added to the list successfully."
            );
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function edit(Pharmacy $pharmacy)
    {
        try {
            return view("admin.content.pharmacy.edit", compact("pharmacy"));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update(Request $request, Pharmacy $pharmacy)
    {
        try {
            $pharmacy->update($request->except("password"));
            if ($request->password) {
                $pharmacy->update([
                    "password" => Hash::make($request->password),
                ]);
            }
            alert(
                "Success",
                "Pharmacy information updated successfully.",
                "success"
            );
            return redirect()->route("admin.pharmacy.index");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function destroy(Pharmacy $pharmacy)
    {
        try {
            $pharmacy->delete();
            alert("Success", "Pharmacy deleted successfully.", "success");
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
