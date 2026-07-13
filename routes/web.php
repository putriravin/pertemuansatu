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

// Modul 4: Produk
Route::get('/tambah-produk', function () {
    return view('tambahProduk');
});
Route::post('/tambah-produk', [ProdukController::class, 'insert'])->name('produk.submit');
Route::get('/data-produk', [ProdukController::class, 'index'])->name('produk.data');
