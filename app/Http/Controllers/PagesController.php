<?php

namespace App\Http\Controllers;

use App\Models\Disponibility;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $availabilities = Disponibility::where('doctor_id', auth()->id())
            ->whereDate('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->get();
        return view('doctor.DoctorShudule', compact('availabilities'));
    }

    public function storeSchedule(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i|after_or_equal:09:00|before_or_equal:18:00',
            'end_time' => 'required|date_format:H:i|after:start_time|after_or_equal:09:00|before_or_equal:18:00',
        ], [
            'date.after_or_equal' => 'La date doit être aujourd\'hui ou ultérieure.',
            'end_time.after' => 'L\'heure de fin doit être après l\'heure de début.',
        ]);

        if ($validated['date'] === now()->toDateString()) {
            $currentTime = Carbon::now()->format('H:i');
            if (Carbon::createFromFormat('H:i', $validated['start_time'])->lt(Carbon::createFromFormat('H:i', $currentTime))) {
                return redirect()->back()->withErrors(['start_time' => 'L\'heure de début doit être égale ou supérieure à l\'heure actuelle.'])->withInput();
            }
        }

        $validated['doctor_id'] = auth()->id();
        Disponibility::create($validated);

        return redirect()->back()->with('success', 'Disponibilité enregistrée avec succès.');
    }
}
