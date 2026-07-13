<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function insert(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'nama' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'kategori' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menyimpan gambar
        $gambarPath = $request->file('gambar')->store('public/gambar');

        // Insert data ke dalam database
        $produk = new Produk;
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->kategori = $request->kategori;
        $produk->gambar = $gambarPath; // Simpan path gambar

        if ($produk->save()) {
            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
        } else {
            // Jika gagal menyimpan, tampilkan pesan gagal
            return redirect()->back()->with('error', 'Gagal menambahkan produk.');
        }
    }

    public function index()
    {
        $produks = Produk::all();
        return view('lihatProduk', compact('produks'));
    }
}
