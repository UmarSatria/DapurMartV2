<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use Illuminate\Http\Request;

class SosmedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sosmed = Sosmed::all();
        return view ('sosmed', compact('sosmed'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'facebook' => 'required|string',
            'twitter' => 'required|string',
            'linkedin' => 'required|string',
            'pinterest' => 'required|string',
            'telepon' => 'required',
        ]);

        Sosmed::create([
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'pinterest' => $request->pinterest,
            'telepon' => $request->telepon,
        ]);

        return redirect()->back()->with('success', 'Data social media baru berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Sosmed $sosmed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sosmed $sosmed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sosmed $sosmed)
    {
        $request->validate([
            'facebook' => 'required|string',
            'twitter' => 'required|string',
            'linkedin' => 'required|string',
            'pinterest' => 'required|string',
            'telepon' => 'required',
        ]);

        $sosmed->update([
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'pinterest' => $request->pinterest,
            'telepon' => $request->telepon,
        ]);

        return redirect()->back()->with('success', 'Data social media berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sosmed $sosmed)
    {
        $sosmed->delete();
        return redirect()->back()->with('success', 'Data social media berhasil dihapus.');
    }
}
