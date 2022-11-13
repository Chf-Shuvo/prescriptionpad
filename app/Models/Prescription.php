<?php

namespace App\Models;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table = "prescriptions";
    protected $guarded = ["id"];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, "doctor_id", "id");
    }

    public function patient()
    {
        return $this->belongsTo(User::class, "patient_id", "id");
    }
}
