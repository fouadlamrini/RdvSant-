<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
 
    function showAbout()
    {
        return view('pages/About');
    }
    function showHome()
    {
        return view('pages/Home');
    }


 
       function doctorShudule(){
    return view('doctor/DoctorShudule');}
}  
