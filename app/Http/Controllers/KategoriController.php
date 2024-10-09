<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KategoriRequest;
use App\Models\Barang;
use App\Models\Kategori;
use Exception;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $data = Kategori::query();

        if ($search) {
            $data->where('kategori', 'like', '%' . $search . '%');
        }

        $data = $data->paginate(3);

        return view('kategori', compact('data', 'search'));
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
    public function store(KategoriRequest $request)
    {
        Kategori::create($request->all());
        return to_route('kategori.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        $barangs = Barang::where('kategori_id', $kategori->id)->get();
        return view('filter-kategori', compact('kategori','barangs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KategoriRequest $request, $id)
    {
        $request->validate([
            'kategori' => 'required',
        ]);

        $kategori = Kategori::findOrFail($id);

        // Update data
        $kategori->update([
            'kategori' => $request->input('kategori'),
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = Kategori::findOrFail($id);
            $data->delete();

            return redirect()->route('kategori.index')->with('success', 'Berhasil menghapus data.');

        } catch (Exception $e) {

            return redirect()->route('kategori.index')->with('warning', 'Gagal menghapus data karena data masih digunakan.');
        }
    }
}
