<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{



    public function profile() {

        $user = Auth::user();
        $profile = $user->profile;

        // kalau belum ada, buat default
        if (!$profile) {
            $profile = Profile::create([
                'user_id' => $user->id,
            ]);
        }

        return view('profile.profile', compact('user', 'profile'));

    }

    public function edit(Profile $profile)
    {
        $profile = Auth::user()->profile;
        return view('profile.index', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = Auth::user()->profile;

        $request->validate([
            'name' => 'required|string|max:30',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gender' => 'nullable|in:L,P',

        ]);

        $data = $request->only(['name', 'date_of_birth', 'address', 'phone_number', 'gender']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('profile', 'public');
        }

        // Update profile
        $profile->update($data);

        // Reload data terbaru dari database
        $profile = $profile->fresh();

        // Lihat hasil update
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
