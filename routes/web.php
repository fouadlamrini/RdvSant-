<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('auth/login');
});
Route::get('/signup/docteur', function () {
    return view('auth/SignUpDoctor');
});
Route::get('/signup/patient', function () {
    return view('auth/SignUpPatient');
});

Route::post("signup/patient", [AuthController::class,"RegisterPatient"])->name("signup.patient");

