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

    public function doctorShudule()
    {
        $availabilities = Disponibility::where('doctor_id', auth()->id())->get();
        return view('doctor.DoctorShudule', compact('availabilities'));
    }

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
