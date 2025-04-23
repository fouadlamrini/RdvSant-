<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'appointment_date',
        'start_time',
        'end_time',
        'status',
    ];   

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function videoConsultation()
{
    return $this->hasOne(VideoConsultation::class, 'appointment_id');
}
}
