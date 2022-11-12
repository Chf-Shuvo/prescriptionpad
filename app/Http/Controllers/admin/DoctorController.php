<?php

namespace App\Http\Controllers\admin;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function index()
    {
        try {
            $doctors = Doctor::all();
            return view("admin.content.doctor.index", compact("doctors"));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function store(Request $request)
    {
        try {
            // return $request;
            $img = Image::make($request->image);
            $img->resize(150, 150)->encode("jpg");
            $image_name = uniqid() . ".jpg";
            Storage::disk("public")->put("images/doctor/" . $image_name, $img);
            $doctor = Doctor::create($request->except("image", "password"));
            $doctor->update([
                "image" => $image_name,
                "password" => Hash::make($request->password),
            ]);
            alert()->success(
                "Success",
                "Doctor added to the list successfully."
            );
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function edit(Doctor $doctor)
    {
        try {
            return view("admin.content.doctor.edit", compact("doctor"));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update(Request $request, Doctor $doctor)
    {
        try {
            $doctor->update($request->except("image", "password"));
            if ($request->password) {
                $doctor->update([
                    "password" => Hash::make($request->password),
                ]);
            }
            if ($request->has("image")) {
                $img = Image::make($request->image);
                $img->resize(150, 150)->encode("jpg");
                $image_name = uniqid() . ".jpg";
                Storage::disk("public")->delete(
                    "images/doctor/" . $doctor->image
                );
                Storage::disk("public")->put(
                    "images/doctor/" . $image_name,
                    $img
                );
                $doctor->update([
                    "image" => $image_name,
                ]);
            }
            alert(
                "Success",
                "Doctor information updated successfully.",
                "success"
            );
            return redirect()->route("admin.doctor.index");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function destroy(Doctor $doctor)
    {
        try {
            Storage::disk("public")->delete("images/doctor/" . $doctor->image);
            $doctor->delete();
            alert("Success", "Doctor deleted successfully.", "success");
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
