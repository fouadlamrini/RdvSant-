<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function RegisterPatient(Request $request){

        $request->validate([

            "first_name" => "required|string|max:255|regex:/^[a-zA-ZÀ-ÿ\s]+$/",
            "last_name"  => "required|string|max:255|regex:/^[a-zA-ZÀ-ÿ\s]+$/",
            "email"      => "required|email|unique:users",
            "password"   => "required|min:8",
           
        ],
        [
            "first_name.required" => "First name is required.",
            "first_name.regex"    => "The first name must only contain letters.",
            "last_name.required"  => "Last name is required",
            "last_name.regex"     => "The last name must only contain letters",
            "email.required"      => "Email is required.",
            "email.email"         => "Please enter a valid email address.",
            "email.unique"        => "This email is already in exist.",
            "password.required"   => "Password is required.",
            "password.min"        => "Password must contain at least 8 characters.",
        ]
    );
    $patient = User::create([
        'first_name' => $request->first_name,
        'last_name'  => $request->last_name,
        'email'      => $request->email,
        'password'   => Hash::make($request->password),
        'role'       => 'patient', 
    ]);

   
    return redirect()->back()->with("success", "Your Account created successfully");
        
    }
    public function RegisterDoctor(Request $request){


    }

   
}
