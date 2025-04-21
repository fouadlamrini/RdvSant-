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


}
