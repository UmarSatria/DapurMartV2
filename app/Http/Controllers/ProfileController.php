<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Show the form for creating a new resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        return view('layouts.pages.profile', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    public function alamat(Request $request)
    {
        $user = Auth::user();
        return view('layouts.pages.alamat', compact('user'));
    }

    /**
     * Display the specified resource.
     */



    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'photo_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('photo_profile')) {
            $file = $request->file('photo_profile');
            $path = $file->store('profile_photos', 'public');

            // Hapus gambar lama jika ada
            if ($user->photo_profile && \Storage::exists('public/'.$user->photo_profile)) {
                \Storage::delete('public/'.$user->photo_profile);
            }

            // Simpan path gambar baru ke dalam database
            $user->photo_profile = $path;
        }

        // Simpan perubahan pada user
        $user->save();

        // Redirect kembali ke halaman profile.show dengan pesan sukses
        return redirect()->route('profile', $user->id)->with('success', 'Profile updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
