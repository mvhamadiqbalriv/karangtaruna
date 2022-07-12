<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Level;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $level = Level::all();
        return view('auth.profile', compact('level'));
    }

    public function update(ProfileUpdateRequest $request)
    {

        $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required|max:255|string|unique:users,username,'.Auth::user()->id_user.',id_user',
            'email' => 'required|max:255|string|unique:users,email,'.Auth::user()->id_user.',id_user',
            'password' => 'required|min:6|string|confirmed'
        ]);

        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }

        auth()->user()->update([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'email' => $request->email,
            'id_level' => $request->id_level,
        ]);

        return redirect()->back()->with('success', 'Profile updated.');
    }
}
