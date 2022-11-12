<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Pharmacy extends Authenticatable
{
    protected $table = "pharmacies";
    protected $guarded = ["id"];

    protected $hidden = ["password"];
}
