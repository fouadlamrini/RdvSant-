<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disponibility extends Model
{
    protected $fillable = ['doctor_id','date', 'start_time','end_time'];
  public function doctor()
      {
          return $this->belongsTo(User::class, 'doctor_id');
      }
  }
