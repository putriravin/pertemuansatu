<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produk;

class ScanController extends Controller
{
    public function index()
    {
        return view('scandataproduk');
    }

    public function processScanProduk(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        $code = $request->input('code');

        // Cari produk berdasarkan SKU atau ID
        $product = Produk::where('sku', $code)
                         ->orWhere('id', is_numeric($code) ? $code : null)
                         ->orWhere('nama', $code)
                         ->first();

        if ($product) {
            return response()->json([
                'success' => true,
                'code'    => $code,
                'product' => [
                    'name'     => $product->nama,
                    'sku'      => $product->sku,
                    'price'    => $product->harga,
                    'stok'     => $product->stok,
                    'kategori' => $product->kategori,
                    'image'    => $product->gambar
                                    ? asset(str_replace('storage/', 'storage/', $product->gambar))
                                    : null,
                ]
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Produk dengan SKU "' . $code . '" tidak ditemukan di database.',
            'code'    => $code
        ]);
    }
}
