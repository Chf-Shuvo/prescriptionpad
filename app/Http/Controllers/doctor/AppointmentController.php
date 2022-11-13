<?php

namespace App\Http\Controllers\doctor;

use App\Enums\Status;
use App\Models\Appointment;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function index()
    {
        try {
            $appointments = Appointment::where("doctor_id", auth()->user()->id)
                ->orderBy("schedule", "asc")
                ->get();
            return view(
                "doctor.content.appointment.index",
                compact("appointments")
            );
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function attendAppointment(Appointment $appointment)
    {
        try {
            $previous_history = Appointment::where(
                "patient_id",
                $appointment->patient_id
            )
                ->where("status", Status::Attended)
                ->get();
            return view(
                "doctor.content.appointment.attend",
                compact("appointment", "previous_history")
            );
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function viewAppointment(Appointment $appointment)
    {
        try {
            return view(
                "doctor.content.appointment.view",
                compact("appointment")
            );
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function prescription(Request $request, Appointment $appointment)
    {
        try {
            $appointment->update([
                "status" => Status::Attended,
            ]);
            Prescription::create([
                "appointment_id" => $appointment->id,
                "doctor_id" => $appointment->doctor_id,
                "patient_id" => $appointment->patient_id,
                "dx" => $request->dx,
                "rx" => $request->rx,
            ]);
            alert(
                "Prescribed",
                "Appointment attended successfully, the patient has been notified through email",
                "success"
            );
            return redirect()->route(
                "doctor.appointment.view",
                $appointment->id
            );
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
