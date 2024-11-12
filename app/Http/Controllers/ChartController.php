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
    public function destroy(Request $request, string $id)
    {
        $request->validate([
            'alamat' => 'required|string',
            'no_telp' => 'required|numeric',
            'jumlah_pembelian' => 'required|numeric|min:1',
        ], [
            'alamat.required' => 'Alamat harus diisi.',
            'no_telp.required' => 'Nomor telepon harus diisi.',
            'no_telp.numeric' => 'Nomor telepon harus berupa angka.',
            'jumlah_pembelian.required' => 'Data harus diisi',
            'jumlah_pembelian.numeric' => 'Data harus berupa angka',
            'jumlah_pembelian.min' => 'Data tidak boleh kurang dari 1',
        ]);

        $cart = Chart::findOrFail($id);

        $barang = Barang::findOrFail($cart->barang_id);
        if ($request->jumlah_pembelian <= $barang->stok) {
            $barang->stok -= $request->jumlah_pembelian;
            $barang->update();
        } else {
            return redirect()->back()->with('warning', "Jumlah stok kurang, maksimal tersedia $barang->stok barang.");
        }

        $carts = $request->all();
        $carts['barang_id'] = $cart->barang_id;
        $carts['total'] = $request->jumlah_pembelian * $cart->barang->harga_satuan;

        Pesanan::create($carts);

        $cart->delete();
        return redirect()->route('pesanan.index')->with('success', 'Pemesanan Berhasil');
    }
}
