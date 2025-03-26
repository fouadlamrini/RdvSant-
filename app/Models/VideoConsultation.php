<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoConsultation extends Model
{
    protected $fillable = [
        'appointment_id',
        'video_link',
        'status',
        'patient_id',
        'doctor_id',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }
}
