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
        // dd($request->all());
        $validated = $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'date' => 'required|date',
        ]);

        $validated['doctor_id'] = auth()->id();
        Disponibility::create($validated);
        return redirect()->back()->with('success', 'Schedule created successfully.');
    }
}  
