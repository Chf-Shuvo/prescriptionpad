<?php

namespace App\Models;

use App\Enums\GenderType;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    protected $table = "doctors";
    protected $guarded = ["id"];

    protected $hidden = ["password"];

    protected $casts = [
        "gender" => GenderType::class,
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, "doctor_id", "id");
    }
}
