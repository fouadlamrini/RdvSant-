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
        return view('admin.dashboard', compact('users'));
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
        $patientId = auth()->id();
        $totalAppointments = Appointment::where('patient_id', $patientId)->count();

        return view('patient.dashboard', compact('doctors', 'totalAppointments'));
    }

    public function mesRendezVous()
    {
        $patientId = auth()->id();

        $appointmentsConfirmed = Appointment::where('patient_id', $patientId)
            ->where('status', 'confirmed')
            ->with('doctor')
            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->get();

        $totalAppointments = Appointment::where('patient_id', $patientId)->count();

        return view('patient.MesRendezVous', compact('appointmentsConfirmed', 'totalAppointments'));
    }

    public function mesReservations()
    {
        $patientId = auth()->id();

        $appointmentsPending = Appointment::where('patient_id', $patientId)
            ->where('status', 'pending')
            ->with('doctor')
            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->get();

        $totalAppointments = Appointment::where('patient_id', $patientId)->count();

        return view('patient.MesReservations', compact('appointmentsPending', 'totalAppointments'));
    }

    public function doctorStatistics()
    {
        $doctorId = auth()->user()->id;

        $totalPatients = Appointment::where('doctor_id', $doctorId)->distinct('patient_id')->count('patient_id');
        $totalAppointments = Appointment::where('doctor_id', $doctorId)->count();
        $confirmedAppointments = Appointment::where('doctor_id', $doctorId)->where('status', 'confirmed')->count();
        $pendingAppointments = Appointment::where('doctor_id', $doctorId)->where('status', 'pending')->count();

        return view('doctor.statistique', compact('totalPatients', 'totalAppointments', 'confirmedAppointments', 'pendingAppointments'));
    }

    public function adminStatistics()
    {
        $totalUsers = User::count();
        $totalDoctors = User::where('role', 'doctor')->count();
        $totalPatients = User::where('role', 'patient')->count();
        $totalAppointments = Appointment::count();

        return view('admin.statistique', compact('totalUsers', 'totalDoctors', 'totalPatients', 'totalAppointments'));
    }
}
