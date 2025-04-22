<?php

namespace App\Http\Controllers;

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
     
        return view('doctor.dashboard');
    }

    public function patientDashboard()
    {
        $doctors = User::where('status', 'active')->where('role', 'doctor')->get(); 
        return view('patient.dashboard', compact('doctors'));
    }

    
}
