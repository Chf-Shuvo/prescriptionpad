<?php

namespace App\Http\Controllers\admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        try {
            $admins = Admin::all();
            return view("admin.content.admin.index", compact("admins"));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function store(Request $request)
    {
        try {
            $admin = Admin::create($request->all());
            $admin->update([
                "password" => Hash::make($request->password),
            ]);
            alert()->success(
                "Success",
                "Admin added to the list successfully."
            );
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function edit(Admin $admin)
    {
        try {
            return view("admin.content.admin.edit", compact("admin"));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update(Request $request, Admin $admin)
    {
        try {
            $admin->update($request->except("password"));
            if ($request->password) {
                $admin->update([
                    "password" => Hash::make($request->password),
                ]);
            }
            alert(
                "Success",
                "Admin information updated successfully.",
                "success"
            );
            return redirect()->route("admin.manage.index");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function destroy(Admin $admin)
    {
        try {
            if (auth()->user()->id == $admin->id) {
                alert("Error", "Cannot delete your own account.", "error");
            } else {
                $admin->delete();
                alert("Success", "Admin deleted successfully.", "success");
            }
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
