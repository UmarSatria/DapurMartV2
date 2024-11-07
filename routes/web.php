<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardSeller;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SosmedController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlamatController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('first');
});

Auth::routes(['verify' => true]);

// redirect verify
Route::get('/grosir', [UserController::class, 'index'])->name('grosir.index');
Route::resource('grosir', UserController::class)->middleware('verified');
Route::resource('welcome', Controller::class);

// CONTACT
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::resource('contact', ContactController::class);

// route user
Route::group(['middleware' => ['auth']], function () {

    Route::get('/shop', [ShopController::class, 'index'])->name('shop.page');
    Route::resource('shop', ShopController::class);
    Route::resource('chart', ChartController::class);

    // USER PROFILE
    Route::resource('profile', ProfileController::class);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/alamat', [AlamatController::class, 'index'])->name('alamat.index');
    Route::resource('alamat', AlamatController::class);
    Route::post('/alamat/bulk-delete', [AlamatController::class, 'bulkDelete'])->name('alamat.bulkDelete');
    Route::get('/sell', [SellerController::class, 'index'])->name('sell');
    Route::resource('sell', SellerController::class);
});

// login admin
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::resource('home', HomeController::class);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('sosmed', SosmedController::class);

    // kategori
    // barang dan kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::resource('kategori', KategoriController::class);
    Route::get('kategori/{kategori}', [KategoriController::class, 'show'])->name('kategori.show');

    // GALERI
    Route::get('galeri/create', [GaleriController::class, 'create'])->name('galeri.create');
    Route::get('galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::post('galeri', [GaleriController::class, 'store'])->name('galeri.store');
    Route::put('/galeri/{galeri}', [GaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{galeri}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

    // sosmed
    Route::post('/sosmed', [SosmedController::class, 'store'])->name('sosmed.store');
    Route::get('/sosmed/{sosmed}/edit', [SosmedController::class, 'edit'])->name('sosmed.edit');
    Route::put('/sosmed/{sosmed}', [SosmedController::class, 'update']);
    Route::delete('/sosmed/{sosmed}', [SosmedController::class, 'destroy'])->name('sosmed.destroy');
});

// Route seller
Route::middleware(['auth', 'role:Seller'])->group(function () {
    Route::get('/dashboardseller', [SellerController::class, 'showData'])->name('seller.dashboard');

    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::resource('barang', BarangController::class);

});

Route::resource('pembayaran', PembayaranController::class);

Route::get('pesanan/{id}/edit-status', 'PesananController@editStatus')->name('pesanan.editStatus');
Route::put('pesanan/{id}/update-status', [PesananController::class, 'updateSgtatus'])->name('update_status');
