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

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

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
