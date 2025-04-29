<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);

        if ($user->status === 'pending') {
            $user->status = 'active';
        } elseif ($user->status === 'active') {
            $user->status = 'inactive';
        } elseif ($user->status === 'inactive') {
            $user->status = 'active';
        }

        $user->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back();
    }

    public function searchDoctors(Request $request)
    {
        $query = User::query()->where('role', 'doctor');

        if ($request->filled('speciality') && $request->speciality !== '') {
            $query->where('speciality', $request->speciality);
        }

        if ($request->filled('city')) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }

        $doctors = $query->get();

        return view('patient.dashboard', compact('doctors'));
    }

    public function searchUsers(Request $request)
    {
        $search = $request->input('search');
        $users = User::query()
            ->where('first_name', 'like', '%' . $search . '%')
            ->orWhere('last_name', 'like', '%' . $search . '%')
            ->get();

        return view('admin.dashboard', compact('users'));
    }
}
