<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = "appointments";
    protected $guarded = ["id"];

    protected $casts = [
        "status" => Status::class,
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, "doctor_id", "id");
    }
}
