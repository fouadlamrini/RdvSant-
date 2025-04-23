<?php

namespace App\Http\Controllers;

use App\Models\Disponibility;
use Illuminate\Http\Request;

class PagesController extends Controller
{
 
    function showAbout()
    {
        return view('pages/About');
    }
    function showHome()
    {
        return view('pages/Home');
    }


 
       function doctorShudule(){
    return view('doctor/DoctorShudule');}

    public function storeSchedule(Request $request)
    {
        $request->validate([
            'day_of_week' => 'required|string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ]);

        Disponibility::create([
            'doctor_id' => auth()->id(),
            'day_of_week' => $request->day_of_week,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->back()->with('success', 'Schedule created successfully.');
    }
}  
