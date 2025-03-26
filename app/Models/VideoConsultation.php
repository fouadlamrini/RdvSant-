<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoConsultation extends Model
{
    protected $fillable = [
        'rendez_vous_id',
        'video_link',
        'status',
        'patient_id',
        'doctor_id',
    ];
}
