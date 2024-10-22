<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.pages.seller.add_seller');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $addSeller = $request->validate([
            'store_name' => 'required|string|max:40',
            'store_icon' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'slogan' => 'nullable|string|max:100',
            'store_description' => 'nullable|string|max:200',
            'store_address' => 'nullable|string|max:200',
        ]);

        $iconPath = null;
        if ($request->hasFile('store_icon')) {
            $iconPath = $request->file('store_icon')->store('store_icons', 'public');
        }

        Seller::create([
            'user_id' => Auth::id(),
            'store_name' => $addSeller['store_name'],
            'store_icon' => $iconPath,
            'slogan' => $addSeller['slogan'],
            'store_description' => $addSeller['store_description'],
            'store_address' => $addSeller['store_address'],
        ]);

        // change role
        $user = Auth::user();
        $user->role = 'Seller';
        $user->save();

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
