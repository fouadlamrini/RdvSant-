<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disponibilite extends Model
{
  protected  $fillable=[
    'doctor_id',
    'jour_par_semain',
    'start_time',
    'end_time',
];
}
