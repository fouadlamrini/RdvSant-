<?php

namespace App\Http\Controllers;

use App\Models\Disponibility;
use Illuminate\Http\Request;

class DisponibilityController extends Controller
{
    

    public function getScheduleEvents()
{
    $events = Disponibility::where('doctor_id', auth()->id())
                ->get()
                ->map(function($disponibility) {
                    return [
                        'title' => 'Available',
                        'start' => $disponibility->day_of_week . ' ' . $disponibility->start_time,
                        'end' => $disponibility->day_of_week . ' ' . $disponibility->end_time,
                    ];
                });

    return response()->json($events);
}
}
