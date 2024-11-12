<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Sosmed;
use App\Models\Seller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sosmed = Sosmed::all();
        $query = $request->input('search');

        if ($query) {
            // Cari barang berdasarkan nama produk dan sertakan informasi seller
            $shops = Barang::with('seller', 'kategori') // Sertakan relasi seller dan kategori
                            ->where('nama_produk', 'like', '%' . $query . '%')
                            ->paginate(3);
        } else {
            // Ambil semua barang dan sertakan informasi seller
            $shops = Barang::with('seller', 'kategori')->paginate(3);
        }

        return view('shop', compact('shops', 'query', 'sosmed'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
