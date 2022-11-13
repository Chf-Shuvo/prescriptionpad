<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = "patients";
    protected $guarded = ["id"];

    protected $hidden = ["password"];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, "patient_id", "id");
    }
}
