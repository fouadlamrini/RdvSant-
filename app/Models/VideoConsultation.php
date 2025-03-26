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

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
    public function rendezVous()
    {
        return $this->belongsTo(RondedzVous::class, 'rendez_vous_id');
    }
}
