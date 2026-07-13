<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetingsController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProdukController;

// Modul 2
Route::get('/', [GreetingsController::class, 'welcome']);
Route::get('/hello/{name}/{npm}', [GreetingsController::class, 'greet']);

// Modul 3: Portfolio
Route::get('/portfolio', [PortfolioController::class, 'home'])->name('portfolio.home');
Route::get('/portfolio/profil', [PortfolioController::class, 'profil'])->name('portfolio.profil');
Route::get('/portfolio/pendidikan', [PortfolioController::class, 'pendidikan'])->name('portfolio.pendidikan');
Route::get('/portfolio/keahlian', [PortfolioController::class, 'keahlian'])->name('portfolio.keahlian');

// Modul 4: Produk (Bootcamp)
Route::get('/tambah-produk', function () {
    return view('tambahProduk');
});
Route::post('/tambah-produk', [ProdukController::class, 'insert'])->name('produk.submit');
Route::get('/data-produk', [ProdukController::class, 'index'])->name('produk.data');

// Test Modul 4 Halaman 47: Lihat Data Daerah
Route::get('/cek-lokasi', function () {
    // Ambil data provinsi beserta relasinya (kota -> kecamatan -> kelurahan)
    $data = App\Models\Provinsi::with('kota.kecamatan.kelurahan')->get();
    return response()->json($data, 200, [], JSON_PRETTY_PRINT);
});

// Modul 5: CRUD Mahasiswa dan Nilai
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\NilaiController;

Route::resource('mahasiswa', MahasiswaController::class);
Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');
Route::get('/nilai/{mahasiswaId}', [NilaiController::class, 'showNilaiMahasiswa'])->name('tampilnilai');
