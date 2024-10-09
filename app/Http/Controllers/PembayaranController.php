<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
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
        $pesanan = Pesanan::all();
        $data = $request->all();
        $bukti = $request->file('bukti');

        $data['bukti'] = Str::random(20) . '.' . $bukti->getClientOriginalExtension();
        Storage::disk('public')->put($data['bukti'], file_get_contents($bukti));
        Pembayaran::create($data);

        return to_route('pemesanan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
