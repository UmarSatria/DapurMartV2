<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $galleries = Galeri::all();
        return view('galeri', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slogan' => 'required|string',
            'deskripsi' => 'required|string',
        ], [
            'title' => 'Isi judul untuk galeri',
            'image' => 'Isi gambar untuk galeri',
            'slogan' => 'Isi slogan untuk galeri',
            'deskripsi' => 'Isi deskripsi galeri',
        ]);

        // Upload image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Save galeri data
        $galeri = new Galeri();
        $galeri->title = $request->title;
        $galeri->image = $imageName;
        $galeri->slogan = $request->slogan;
        $galeri->deskripsi = $request->deskripsi;
        $galeri->save();

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeri $galeri)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galeri $galeri)
    {
        $galleries = Galeri::all();
        $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slogan' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        // update data
        $galeri->title = $request->title;
        $galeri->slogan = $request->slogan;
        $galeri->deskripsi = $request->deskripsi;

        // edit foto
        if ($request->hasFile('im age')) {
            // upload foto
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images') . $imageName);
            // hapus foto
            if (file_exists(public_path('images/' . $galeri->image))) {
                unlink(public_path('images/' . $galeri->image));
            }
            $galeri->image = $imageName;
        }

        $galeri->save();

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
        if ($galeri->image) {
            unlink(public_path('images/' . $galeri->image));
        }
        $galeri->delete();
        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }
}
