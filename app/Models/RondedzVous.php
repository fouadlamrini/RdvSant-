<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RondedzVous extends Model
{
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'date_rendez_vous',
        'status',
    ];
}
