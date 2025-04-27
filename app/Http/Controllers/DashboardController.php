<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.dashboard',compact('users'));
    }

    public function doctorDashboard()
    {
        $doctorId = auth()->id();
        $appointments = Appointment::where('doctor_id', $doctorId)
        ->with('patient')
        ->get();
        return view('doctor.dashboard', compact('appointments', 'doctorId'));
    }

    public function patientDashboard()
    {
        $doctors = User::where('status', 'active')->where('role', 'doctor')->get(); 
    
        return view('patient.dashboard', compact('doctors'));
    }

public function mesRendezVous()
    {
        $appointments = Appointment::where('patient_id', auth()->id())
            ->where('status', 'confirmed')
            ->with('doctor')
            ->get();

        return view('patient.MesRendezVous', compact('appointments'));
    }    
}
