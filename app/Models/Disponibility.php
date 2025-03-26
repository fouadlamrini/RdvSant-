<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disponibility extends Model
{
    protected  $fillable=[
      'doctor_id',
      'day_by_week',
      'start_time',
      'end_time',
  ];
  public function doctor()
      {
          return $this->belongsTo(User::class, 'doctor_id');
      }
  }
