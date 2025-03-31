<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
Route::get('/login', [UserController::class, 'index']);
