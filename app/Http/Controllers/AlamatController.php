<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $alamat = Alamat::where('user_id', $user->id)->get();
        return view('layouts.pages.alamat', compact('user', 'alamat'));
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
        // Validasi input
        $request->validate([
            'nama_jalan' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'status' => 'in:utama,custom',
        ]);

        // Dapatkan user yang sedang login
        $user = Auth::user();

        // Periksa apakah user sudah memiliki alamat utama
        $existingPrimaryAddress = Alamat::where('user_id', $user->id)->where('status', 'utama')->first();

        // Jika alamat utama sudah ada, ubah status alamat baru menjadi 'custom'
        $status = $existingPrimaryAddress ? 'custom' : $request->input('status', 'utama');

        // Buat data alamat baru
        Alamat::create([
            'user_id' => $user->id,
            'nama_jalan' => $request->input('nama_jalan'),
            'provinsi' => $request->input('provinsi'),
            'kota' => $request->input('kota'),
            'kecamatan' => $request->input('kecamatan'),
            'kelurahan' => $request->input('kelurahan'),
            'status' => $status,
        ]);

        // Redirect ke halaman alamat dengan pesan sukses
        return redirect()->route('alamat.index')->with('success', 'Alamat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alamat $alamat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alamat $alamat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alamat $alamat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function bulkDelete(Request $request)
    {
        // Validasi input
        $request->validate([
            'alamat_ids' => 'required|array',
            'alamat_ids.*' => 'exists:alamats,id',
        ]);

        // Hapus alamat yang dipilih
        Alamat::whereIn('id', $request->alamat_ids)->delete();

        // Redirect ke halaman alamat dengan pesan sukses
        return redirect()->route('alamat.index')->with('success', 'Alamat yang dipilih berhasil dihapus.');
    }

    public function destroy(Alamat $alamat)
    {
        //
    }
}
