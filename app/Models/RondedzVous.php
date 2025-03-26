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
    return $this->hasOne(VideoConsultation::class, 'rendez_vous_id');
}
}
