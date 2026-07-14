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

// Modul 8: Manajemen File Uploads
use App\Http\Controllers\FileUploadController;
Route::get('/upload', [FileUploadController::class, 'showUploadForm'])->name('upload.form');
Route::post('/upload', [FileUploadController::class, 'storeFile'])->name('upload.store');
Route::get('/files', [FileUploadController::class, 'listFiles'])->name('files.list');
Route::delete('/files/{filename}', [FileUploadController::class, 'deleteFile'])->name('files.delete');

// Modul 9: Scan QR & Barcode
use App\Http\Controllers\ScanController;
Route::get('/scan-kamera', function () {
    return view('scankode');
})->name('scan.kamera');
Route::get('/scan-data-produk', [ScanController::class, 'index'])->name('scan.data');
Route::post('/scan-produk', [ScanController::class, 'processScanProduk']);


// Route bawaan Laravel UI (Kecuali login & logout karena kita buat manual di bawah)
Auth::routes(['login' => false, 'logout' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Modul 6 Praktikum 2: Manual Auth
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'cekLogin'])->name('cek-login');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Modul 7: Role Middleware Routes
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', function () {
            return view('admin');
        })->name('admin');
    });

    Route::middleware(['role:owner'])->group(function () {
        Route::get('/owner', function () {
            return view('owner');
        })->name('owner');
    });

    // Modul 7: Usia Middleware Route (Tugas Hal 91)
    Route::middleware(['usia'])->group(function () {
        Route::get('/halaman-dewasa', function () {
            return view('dewasa');
        })->name('dewasa');
    });
    
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah logout.');
    })->name('logout');
});
