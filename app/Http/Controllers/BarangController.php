<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Exception;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
        try {
            // Validasi form
            $request->validate([
                'gambar_produk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'nama_produk' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'kategori_id' => 'required|exists:kategoris,id', // pastikan id kategori valid
                'stok' => 'required|numeric|min:0',
                'harga_per_gram' => 'required|numeric|min:0',
            ]);

            // Menyiapkan data untuk disimpan
            $data = $request->only(['nama_produk', 'deskripsi', 'kategori_id', 'stok', 'harga_per_gram']);

            // Proses upload gambar produk
            if ($request->hasFile('gambar_produk')) {
                $gambar = $request->file('gambar_produk');
                $data['gambar_produk'] = Str::random(20) . '.' . $gambar->getClientOriginalExtension();
                Storage::disk('public')->put($data['gambar_produk'], file_get_contents($gambar));
            }

            // Menyimpan data barang ke dalam database
            Barang::create($data);

            // Redirect ke halaman index dengan pesan sukses
            return redirect()->route('barang.index')->with('success', 'Data berhasil ditambahkan');
        } catch (QueryException $e) {
            // Jika terjadi error, tampilkan pesan error
            return redirect()->back()->with('error', 'Gagal menambahkan data. Silakan coba lagi.');
        }
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
