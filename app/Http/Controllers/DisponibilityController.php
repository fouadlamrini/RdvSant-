<?php

namespace App\Http\Controllers;

use App\Models\Disponibility;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DisponibilityController extends Controller
{


    public function getScheduleEvents()
    {
        $events = Disponibility::where('doctor_id', auth()->id())
            ->get()
            ->map(function ($disponibility) {
                return [
                    'start' => $disponibility->date . ' ' . $disponibility->start_time,
                    'end' => $disponibility->date . ' ' . $disponibility->end_time,
                    'status' => $disponibility->status,

                ];
            });
        return response()->json($events);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i|after_or_equal:09:00|before_or_equal:18:00',
            'end_time' => 'required|date_format:H:i|after:start_time|after_or_equal:09:00|before_or_equal:18:00',
        ]);

        if ($validated['date'] === now()->toDateString()) {
            $currentTime = Carbon::now()->format('H:i');
            if (Carbon::createFromFormat('H:i', $validated['start_time'])->lt(Carbon::createFromFormat('H:i', $currentTime))) {
                return redirect()->back()->withErrors(['start_time' => 'L\'heure de début doit être égale ou supérieure à l\'heure actuelle.'])->withInput();
            }
        }

        $availability = Disponibility::findOrFail($id);
        $availability->update($validated);

        return redirect()->back()->with('success', 'Disponibilité modifiée avec succès.');
    }

    public function destroy($id)
    {
        $availability = Disponibility::findOrFail($id);
        $availability->delete();

        return redirect()->back()->with('success', 'Disponibilité supprimée avec succès.');
    }
}
