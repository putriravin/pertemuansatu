<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;
use OpenApi\Attributes as OA;

#[OA\Tag(name: "Products", description: "API Endpoints for Products")]
class ProductController extends Controller
{
    #[OA\Get(
        path: "/api/products",
        summary: "Get list of products",
        tags: ["Products"],
        responses: [
            new OA\Response(response: 200, description: "Successful operation")
        ]
    )]
    public function index()
    {
        return response()->json(Produk::all(), 200);
    }

    #[OA\Post(
        path: "/api/products",
        summary: "Store new product",
        tags: ["Products"],
        responses: [
            new OA\Response(response: 201, description: "Successful operation")
        ]
    )]
    public function store(Request $request)
    {
        $requestData = $request->input('data') ? json_decode($request->input('data'), true) : $request->all();

        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
        ]);

        $product = new Produk();
        $product->sku = $requestData['sku'] ?? 'SKU-'.time();
        $product->nama = $requestData['nama'];
        $product->kategori = $requestData['kategori'] ?? 'Lainnya';
        $product->harga = $requestData['harga'];
        $product->stok = $requestData['stok'] ?? 0;

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('produk', 'public');
            $product->gambar = 'storage/' . $path;
        }

        $product->save();

        return response()->json($product, 201);
    }

    #[OA\Get(
        path: "/api/products/{id}",
        summary: "Get product information",
        tags: ["Products"],
        parameters: [
            new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))
        ],
        responses: [
            new OA\Response(response: 200, description: "Successful operation")
        ]
    )]
    public function show($id)
    {
        return response()->json(Produk::findOrFail($id), 200);
    }

    #[OA\Put(
        path: "/api/products/{id}",
        summary: "Update existing product",
        tags: ["Products"],
        parameters: [
            new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))
        ],
        responses: [
            new OA\Response(response: 200, description: "Successful operation")
        ]
    )]
    public function update(Request $request, $id)
    {
        $requestData = $request->input('data') ? json_decode($request->input('data'), true) : $request->all();
        $product = Produk::findOrFail($id);

        if (isset($requestData['nama'])) $product->nama = $requestData['nama'];
        if (isset($requestData['harga'])) $product->harga = $requestData['harga'];
        if (isset($requestData['kategori'])) $product->kategori = $requestData['kategori'];
        if (isset($requestData['stok'])) $product->stok = $requestData['stok'];

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('produk', 'public');
            $product->gambar = 'storage/' . $path;
        }

        $product->save();

        return response()->json($product, 200);
    }

    #[OA\Delete(
        path: "/api/products/{id}",
        summary: "Delete existing product",
        tags: ["Products"],
        parameters: [
            new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))
        ],
        responses: [
            new OA\Response(response: 204, description: "Successful operation")
        ]
    )]
    public function destroy($id)
    {
        $product = Produk::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }

    #[OA\Get(
        path: "/api/products/{id}/qrcode",
        summary: "Generate QR Code for a product",
        tags: ["Products"],
        parameters: [
            new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))
        ],
        responses: [
            new OA\Response(response: 200, description: "Successful operation")
        ]
    )]
    public function generateQrCode($id)
    {
        $product = Produk::findOrFail($id);
        
        $qrCodeUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=' . urlencode($product->sku);

        return response()->json([
            'success' => true,
            'product' => $product->nama,
            'sku' => $product->sku,
            'qr_code_url' => $qrCodeUrl
        ]);
    }
}
