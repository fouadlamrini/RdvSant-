<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'speciality',
        'bio',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

public function disponinbilites(){

    return $this->hasMany(Disponibility::class,'doctor_id');
}

public function rendezVousAsPatient()
{
    return $this->hasMany(Appointment::class, 'patient_id');
}

public function rendezVousAsDoctor()
{
    return $this->hasMany(Appointment::class, 'doctor_id');
}

public function videoConsultationsAsPatient()
{
    return $this->hasMany(VideoConsultation::class, 'patient_id');
}


public function videoConsultationsAsDoctor()
{
    return $this->hasMany(VideoConsultation::class, 'doctor_id');
}

}
