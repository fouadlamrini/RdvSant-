<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Disponibility;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    
    public function showAvailableSlots($doctorId)
    {
        $availableSlots = Disponibility::where('doctor_id', $doctorId)
            ->whereDate('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->orderBy('start_time')
            ->get(['date', 'start_time', 'end_time','status']);

        return response()->json($availableSlots);
    }

   
    public function store(Request $request)
    {

        $validated = $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',  
        ]);
        $availability = Disponibility::where('doctor_id', $validated['doctor_id'])
            ->where('date', $validated['appointment_date'])
            ->where('start_time', '<=', $validated['start_time'])
            ->where('end_time', '>=', $validated['end_time'])
            ->exists();

        if (!$availability) {
            return response()->json([
                'success' => false,
                'message' => 'Doctor is not available at the selected time.'
            ], 422);
        }

        $appointment = Appointment::create([
            'doctor_id' => $validated['doctor_id'],
            'patient_id' => Auth::id(),
            'appointment_date' => $validated['appointment_date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
        ]);
        $availability = Disponibility::where('doctor_id', $validated['doctor_id'])
        ->where('date', $validated['appointment_date'])
        ->where('start_time', '<=', $validated['start_time'])
        ->where('end_time', '>=', $validated['end_time'])->update([
            'status' => 'booked',
        ]);

        return redirect() -> back() -> with('success', 'Appointment created successfully.');
    }


    public function confirm($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'confirmed';
        $appointment->save();

        return back()->with('success', 'Appointment confirmed.');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);

        
        Disponibility::where('doctor_id', $appointment->doctor_id)
            ->where('date', $appointment->appointment_date)
            ->where('start_time', '<=', $appointment->start_time)
            ->where('end_time', '>=', $appointment->end_time)
            ->update(['status' => 'available']);

        $appointment->delete();

        return back()->with('success', 'Appointment deleted.');
    }
}
