<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pesanan;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sosmed = Sosmed::all();
        $data = Pesanan::query();
        $pesanan = Pesanan::all();
        $pembayaran = Pembayaran::all();

        if (auth()->user()->role == 'Admin') {
            return view('pesanan_admin', compact('data', 'pesanan','pembayaran'));
        } else {
            return view('pesanan', compact('data', 'pesanan','pembayaran', 'sosmed'));
        }
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

    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);

    if ($request->hasFile('bukti')) {
        $bukti = $request->file('bukti');
        $buktiName = Str::random(20) . '.' . $bukti->getClientOriginalExtension();

        Storage::disk('public')->put($buktiName, file_get_contents($bukti));

        Pembayaran::create([
            'pesanan_id' => $id,
            'bukti' => $buktiName
        ]);

        $pesanan->update(['status' => 'Menunggu Konfirmasi']);

        return redirect()->back()->with('success', 'Bukti berhasil dikirim, silahkan tunggu konfirmasi');
    }

    return redirect()->back()->with('error', 'Mohon unggah bukti pembayaran terlebih dahulu');
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $pesanan = Pesanan::findOrFail($id);

            $pesanan->update(['status' => $request->input('status')]);

            return redirect()->back()->with('success', 'Status Pesanan berhasil diperbarui');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
