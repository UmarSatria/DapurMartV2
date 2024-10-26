<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('layouts.pages.seller.sell');
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // // Tampilkan semua data yang diterima dari form
        // dd($request->all());

        // Validasi data dari form
        $addSeller = $request->validate([
            'store_name' => 'required|string|max:40|unique:sellers', // Pastikan mengganti 'sellers' dengan nama tabel yang sesuai
            'store_icon' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Menjadikan store_icon nullable
            'slogan' => 'nullable|string|max:100',
            'store_description' => 'nullable|string|max:200',
            'store_address' => 'nullable|string|max:200',
        ]);

        // Inisialisasi path ikon
        $iconPath = null;
        // Memeriksa jika ada file yang diupload
        if ($request->hasFile('store_icon')) {
            $iconPath = $request->file('store_icon')->store('store_icons', 'public');
        }

        // Coba untuk menyimpan data ke dalam database
        try {
            Seller::create([
                'user_id' => Auth::id(),
                'store_name' => $addSeller['store_name'],
                'store_icon' => $iconPath,
                'slogan' => $addSeller['slogan'],
                'store_description' => $addSeller['store_description'],
                'store_address' => $addSeller['store_address'],
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['msg' => 'Gagal menyimpan data: ' . $e->getMessage()]);
        }

        // Mengubah role pengguna
        $user = Auth::user();
        $user->role = 'Seller';
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('seller.dashboard')->with('success', 'Toko berhasil didaftarkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seller $seller)
    {
        //
    }
}
