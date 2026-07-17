<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ProdukController extends Controller
{
    public function insert(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'nama' => 'required|string',
            'sku' => 'required|string|unique:produk,sku',
            'harga' => 'required|numeric',
            'stok' => 'nullable|numeric',
            'kategori' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            // Menyimpan gambar di disk public (folder storage/app/public/produk)
            $path = $request->file('gambar')->store('produk', 'public');
            $gambarPath = 'storage/' . $path;
        }

        // Insert data ke dalam database
        $produk = new Produk;
        $produk->nama = $request->nama;
        $produk->sku = $request->sku;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok ?? 0;
        $produk->kategori = $request->kategori;
        $produk->gambar = $gambarPath; // Simpan path gambar

        if ($produk->save()) {
            Alert::success('Berhasil!', 'Kelas Bootcamp baru telah ditambahkan ke sistem.');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Terjadi kesalahan saat menambahkan data kelas.');
            return redirect()->back();
        }
    }

    public function index()
    {
        return view('lihatProduk');
    }

    public function getDatatables()
    {
        $produks = Produk::select(['id', 'nama', 'sku', 'kategori', 'harga', 'stok', 'gambar']);
        return DataTables::of($produks)
            ->addColumn('harga_format', function ($produk) {
                return 'Rp ' . number_format($produk->harga, 0, ',', '.');
            })
            ->addColumn('qr_code', function ($produk) {
                if ($produk->sku) {
                    $url = url('/api/products/' . $produk->id . '/qrcode');
                    return '<a href="'.$url.'" target="_blank" class="btn-qr">Lihat QR</a>';
                }
                return '-';
            })
            ->rawColumns(['qr_code'])
            ->make(true);
    }
}
