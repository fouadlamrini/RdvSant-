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
                        'start' => $disponibility->date . ' ' . $disponibility->start_time,  
                        'end' => $disponibility->date . ' ' . $disponibility->end_time,
                        'status' => $disponibility->status,      

                    ];
                });
    return response()->json($events);
}
}
