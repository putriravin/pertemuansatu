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
        $product = Produk::where('sku', $code)->first();

        if ($product) {
            return response()->json([
                'success' => true,
                'code' => $code,
                'product' => [
                    'name' => $product->nama,
                    'sku' => $product->sku,
                    'price' => $product->harga,
                    'kategori' => $product->kategori,
                    'image' => asset(str_replace('public/', 'storage/', $product->gambar)),
                ]
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Produk tidak ditemukan.',
            'code' => $code
        ]);
    }
}
