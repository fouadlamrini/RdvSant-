<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisponibilityController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/signup/doctor', function () {
    return view('auth/SignUpDoctor');
})->name("signup.doctor");

Route::get('/signup/patient', function () {
    return view('auth/SignUpPatient');
});

Route::post("signup/patient", [AuthController::class, "RegisterPatient"])->name("signup.patient");

Route::post("signup/doctor", [AuthController::class, "RegisterDoctor"])->name("signup.doctor");


Route::post("/login", [AuthController::class, "login"])->name("login");


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/doctor/dashboard', [DashboardController::class, 'doctorDashboard'])->name('doctor.dashboard');
    Route::get('/patient/dashboard', [DashboardController::class, 'patientDashboard'])->name('patient.dashboard');
    Route::get('/admin/users/{id}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggleStatus');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::get('/about',[PagesController::class, 'showAbout'])->name('about');
Route::get('/',[PagesController::class, 'showHome'])->name('home');
Route::get('/doctorShudule',[PagesController::class, 'doctorShudule'])->name('doctorShudule');
Route::post('/doctorShudule', [PagesController::class, 'storeSchedule']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/doctor/schedule/events', [DisponibilityController::class, 'getScheduleEvents']);
