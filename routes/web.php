<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisponibilityController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileContoller;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/users/{id}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggleStatus');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});


Route::middleware(['auth', 'doctor'])->group(function () {

    Route::get('/doctor/dashboard', [DashboardController::class, 'doctorDashboard'])->name('doctor.dashboard');
    Route::get('/doctor/profile', [ProfileContoller::class, 'show'])->name('doctor.profile');
    Route::post('/doctor/profile', [ProfileContoller::class, 'update'])->name('doctor.profile.update');
    Route::get('/doctorShudule', [PagesController::class, 'doctorShudule'])->name('doctorShudule');
    Route::post('/doctorShudule', [PagesController::class, 'storeSchedule']);
    Route::get('/doctor/schedule/events', [DisponibilityController::class, 'getScheduleEvents']);
    Route::put('/disponibility/{id}', [DisponibilityController::class, 'update'])->name('disponibility.update');
    Route::delete('/disponibility/{id}', [DisponibilityController::class, 'destroy'])->name('disponibility.destroy');
    Route::get('/appointments/{id}/confirm', [AppointmentController::class, 'confirm'])->name('appointments.confirm');
});



Route::middleware(['auth', 'patient'])->group(function () {
    Route::get('/patient/dashboard', [DashboardController::class, 'patientDashboard'])->name('patient.dashboard');

    Route::get('/patient/mes-rendez-vous', [DashboardController::class, 'mesRendezVous'])->name('patient.mesRendezVous');
    Route::get('/doctor/{doctorId}/appointments', [AppointmentController::class, 'showAvailableSlots'])->name('appointments.showAvailableSlots');


    Route::post('/doctor/{doctorId}/appointments', [AppointmentController::class, 'bookAppointment'])->name('appointments.book');

    Route::post('appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');

    Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
    
});


Route::middleware(['auth'])->group(function () {


    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
  
    Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
});

Route::get('/about', [PagesController::class, 'showAbout'])->name('about');

Route::get('/', [PagesController::class, 'showHome'])->name('home');

Route::get('/login', function () {
    return view('auth/login');
});

Route::post("/login", [AuthController::class, "login"])->name("login");

Route::get('/signup/doctor', function () {
    return view('auth/SignUpDoctor');
})->name("signup.doctor");
Route::post("signup/doctor", [AuthController::class, "RegisterDoctor"])->name("signup.doctor");

Route::get('/signup/patient', function () {
    return view('auth/SignUpPatient');
});

Route::post("signup/patient", [AuthController::class, "RegisterPatient"])->name("signup.patient");

Route::get('/doctors/search', [UserController::class, 'searchDoctors'])->name('doctors.search');





