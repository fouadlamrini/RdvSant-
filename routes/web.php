<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('auth/login');
});
Route::get('/signup/doctor', function () {
    return view('auth/SignUpDoctor');
})->name("home");
Route::get('/signup/patient', function () {
    return view('auth/SignUpPatient');
});

Route::post("signup/patient", [AuthController::class, "RegisterPatient"])->name("signup.patient");
Route::post("signup/doctor", [AuthController::class, "RegisterDoctor"])->name("signup.doctor");

Route::post("login", [AuthController::class, "login"])->name("login");

Route::get('/pending', function () {
    return view('pending/pending'); })->name('pending.page');

Route::get('/adminDashboard', function () {
    return view('admin/dashboard'); })->name('admin.dashboard');
Route::get('/doctorDashboard', function () {
    return view('doctor/dashboard'); })->name('doctor.dashboard');
Route::get('/patientDashboard', function () {
    return view('patient/dashboard'); })->name('patient.dashboard');
