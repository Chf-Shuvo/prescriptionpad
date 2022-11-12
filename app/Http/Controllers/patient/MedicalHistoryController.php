<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedicalHistoryController extends Controller
{
    public function appointments()
    {
        try {
            $doctors = Doctor::all();
            $appointments = Appointment::orderBy("status", "asc")->get();
            return view(
                "patient.content.appointment.index",
                compact("doctors", "appointments")
            );
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function appointmentBook(Request $request)
    {
        try {
            // return $request;
            $appointment = Appointment::create($request->except("file"));
            if ($request->has("file")) {
                $extension = $request->file->extension();
                if ($extension != "pdf") {
                    $appointment->delete();
                    alert(
                        "Invalid File Type",
                        "File type should be pdf.",
                        "error"
                    );
                    return redirect()->back();
                }
                $file_name = uniqid() . "." . $extension;
                Storage::disk("public")->put(
                    "patient/files/" . $file_name,
                    file_get_contents($request->file)
                );
                $appointment->update([
                    "file" => $file_name,
                ]);
            }
            alert(
                "Success",
                "Your appointment has been booked successfully.",
                "success"
            );
            return redirect()->back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
