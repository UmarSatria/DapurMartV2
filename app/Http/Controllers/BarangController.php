<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $seller = Auth::user();
        $search = $request->input('search');
        $query = Barang::query()->latest();

        if ($search) {
            $query->where('nama_produk', 'like', '%' . $search . '%');
        }

        $data = $query->paginate(3);
        $kategori = Kategori::all();

        return view('layouts.pages.seller.barang', compact('data', 'kategori', 'search', 'seller'));
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
            'gambar_produk' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id', // Pastikan kategori ada
            'stok' => 'required|integer|min:0',
            'harga_per_gram' => 'required|integer|min:0',
        ]);

        // Menangani upload gambar
        if ($request->hasFile('gambar_produk')) {
            // Mengambil file gambar yang di-upload
            $gambar = $request->file('gambar_produk');

            // Membuat nama file yang unik (misalnya menggunakan timestamp)
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();

            // Menyimpan gambar langsung di folder storage (bukan public/gambar_produk)
            $gambar->storeAs('public', $gambarName); // Menyimpan di folder storage/app/public

            // Menyimpan data barang dengan path file
            Barang::create([
                'gambar_produk' => $gambarName, // Menyimpan hanya nama file (gambarName)
                'nama_produk' => $request->nama_produk,
                'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
                'stok' => $request->stok,
                'harga_per_gram' => $request->harga_per_gram,
                'seller_Id' => auth()->id(), // Menggunakan ID penjual yang sedang login
            ]);

            return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
        }

        return back()->with('error', 'Gambar produk tidak valid');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'gambar_produk' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_produk' => 'required',
            'harga_satuan' => 'required|numeric|min:1',
            'stok' => 'required|numeric|min:1',
            'deskripsi' => 'required',
        ], [
            'gambar_produk.required' => 'Data harus diisi',
            'nama_produk.required' => 'Data harus diisi',
            'harga_satuan.required' => 'Data harus diisi',
            'harga_satuan.numeric' => 'Data harus berupa angka',
            'harga_satuan.min' => 'Data tidak boleh kurang dari 1',
            'stok.required' => 'Data harus diisi',
            'stok.numeric' => 'Data harus berupa angka',
            'stok.min' => 'Data tidak boleh kurang dari 1',
            'deskripsi.required' => 'Data harus diisi',
        ]);

        $data = $request->all();
        if ($request->hasFile('gambar_produk')) {
            $gambar_produk = $request->file('gambar_produk');
            $data['gambar_produk'] = Str::random(20) . '.' . $gambar_produk->getClientOriginalExtension();
            Storage::disk('public')->put($data['gambar_produk'], file_get_contents($gambar_produk));
            Storage::disk('public')->delete($barang->gambar_produk);
        } else {
            $data['gambar_produk'] = $barang->gambar_produk;
        }

        $barang->update($data);
        return redirect()->back()->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {

            $data = Barang::findOrFail($id);
            $data->delete();

            return redirect()->route('barang.index')->with('success', 'Berhasil menghapus data.');

        } catch (Exception $e) {

            return redirect()->route('barang.index')->with('warning', 'Gagal menghapus data karena data masih digunakan.');
        }
    }
}
