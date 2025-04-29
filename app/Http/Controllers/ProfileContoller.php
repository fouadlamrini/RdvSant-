<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileContoller extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('doctor/profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'speciality' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete($user->image);
            }
            $validatedData['image'] = $request->file('image')->store('profile_images', 'public');
        }

        $user->update($validatedData);

        return redirect()->route('doctor.profile')->with('success', 'Profile updated successfully.');
    }
}
