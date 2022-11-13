<?php

namespace App\Http\Controllers\doctor;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function dashboard()
    {
        try {
            return view("doctor.content.dashboard");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function profile(Doctor $doctor)
    {
        try {
            return view("doctor.content.profile", compact("doctor"));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function profileUpdate(Request $request, Doctor $doctor)
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
            alert("Success", "Profile  updated successfully.", "success");
            return redirect()->route("doctor.dashboard");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
