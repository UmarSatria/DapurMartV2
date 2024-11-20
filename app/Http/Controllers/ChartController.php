<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Chart;
use App\Models\Pesanan;
use App\Models\Sosmed;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $cart = Chart::all();
        return view('chart', compact('cart'));
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
        $data = $request->all();
        $data['user_id'] = Auth::id(); // Mendapatkan user_id dari pengguna yang sedang login

        Chart::create($data);

        return redirect()->back()->with('success', 'Berhasil ditambahkan ke keranjang');
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

    public function destroy($id)
    {
        $cartItem = Chart::findOrFail($id); // Temukan item berdasarkan ID
        $cartItem->delete(); // Hapus item dari database
        return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang.');
    }
}
