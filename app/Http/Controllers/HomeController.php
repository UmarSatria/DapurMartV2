<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\Galeri;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $totaluser = User::where('role', 'use   r')->count();
        $totalbarang = Barang::count();
        $totalpesanan = Pesanan::count();
        $gallery = Galeri::all();
        $totalbayar = Pembayaran::count();

        return view('home', compact('totaluser', 'totalbarang', 'totalpesanan', 'gallery','totalbayar'));

    }
}
