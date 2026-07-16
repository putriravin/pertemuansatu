# Laporan Jawaban Tugas Praktikum Web II (Modul 1 - 9)

**Nama:** Putri Ravin Nauli
**Mata Kuliah:** Aplikasi Berbasis Web II

Berikut adalah rangkuman jawaban tugas dan *source code* utama dari pengerjaan Modul 1 sampai 9.

---

## Modul 1: Pengenalan Laravel & Routing

**Tugas / Implementasi Utama:**
Membuat rute dasar dan controller untuk menampilkan halaman sapaan.

**1. `routes/web.php` (Routing Dasar)**
```php
use App\Http\Controllers\GreetingsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [GreetingsController::class, 'hello']);
```

**2. `app/Http/Controllers/GreetingsController.php`**
```php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class GreetingsController extends Controller
{
    public function hello()
    {
        return "Halo, selamat datang di praktikum Web II!";
    }
}
```

---

## Modul 2: Blade Templating & Layouts

**Tugas / Implementasi Utama:**
Membuat sistem layout dinamis menggunakan fitur Blade directives (`@extends`, `@section`).

**1. `resources/views/layouts/app.blade.php` (Master Layout)**
```html
<!DOCTYPE html>
<html lang="id">
<head>
    <title>@yield('title') - WebKu</title>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f4f7f6; margin: 0; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
    </style>
</head>
<body>
    <nav>
        <!-- Navigasi -->
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
```

**2. `resources/views/dashboard.blade.php` (Halaman Konten)**
```html
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card">
        <h2>Selamat Datang di Dashboard</h2>
        <p>Ini adalah implementasi Blade layouting.</p>
    </div>
@endsection
```

---

## Modul 3 & 4: Migrasi, Model & CRUD Produk

**Tugas / Implementasi Utama:**
Membuat struktur database tabel `produk` serta operasi Create, Read, Update, Delete.

**1. Migration Tabel Produk**
```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique()->nullable();
            $table->string('nama');
            $table->string('kategori');
            $table->decimal('harga', 15, 2);
            $table->integer('stok')->default(0);
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('produk');
    }
};
```

**2. `app/Models/Produk.php`**
```php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = ['sku', 'nama', 'kategori', 'harga', 'stok', 'gambar'];
}
```

---

## Modul 5: Relasi Database (One-to-Many / Many-to-Many)

**Tugas / Implementasi Utama:**
Merelasikan entitas `Mahasiswa` dengan `Nilai`.

**1. `app/Models/Mahasiswa.php`**
```php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['nama', 'nim', 'alamat'];

    // Relasi One-to-Many ke tabel Nilai
    public function nilais()
    {
        return $this->hasMany(Nilai::class, 'mahasiswa_id');
    }
}
```

**2. `app/Models/Nilai.php`**
```php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = ['mahasiswa_id', 'mata_kuliah', 'nilai'];

    // Relasi balik (BelongsTo) ke tabel Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
```

---

## Modul 6: Autentikasi Login

**Tugas / Implementasi Utama:**
Mengamankan rute sehingga pengguna wajib login sebelum mengakses aplikasi (Route perlindungan menggunakan middleware `auth`).

**`routes/web.php` (Proteksi Middleware)**
```php
// Rute yang membutuhkan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Rute CRUD Produk
    Route::resource('produk', ProdukController::class);
});
```

---

## Modul 7: Middleware (Role & Usia)

**Tugas / Implementasi Utama:**
Membuat Middleware untuk membatasi akses berdasarkan "Role" dan "Usia >= 18 tahun".

**1. `app/Http/Middleware/UsiaMiddleware.php`**
```php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class UsiaMiddleware
{
    public function handle(Request $request, Closure $next, $usiaMinimal)
    {
        $userUsia = auth()->user()->usia ?? 0;
        
        if ($userUsia < $usiaMinimal) {
            return redirect('/dashboard')->with('error', 'Akses ditolak: Usia belum cukup (minimal ' . $usiaMinimal . ' tahun).');
        }
        
        return $next($request);
    }
}
```

**2. `bootstrap/app.php` (Registrasi Middleware di Laravel 11)**
```php
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
            'usia' => \App\Http\Middleware\UsiaMiddleware::class,
        ]);
    })->create();
```

---

## Modul 8: File Upload & Storage

**Tugas / Implementasi Utama:**
Menyimpan file yang diunggah, memvalidasi format (JPG/PNG), serta mengaktifkan fitur hapus & download.

**`app/Http/Controllers/FileUploadController.php`**
```php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png|max:2048'
        ], [
            'file.mimes' => 'Hanya file JPG, JPEG, dan PNG yang diizinkan!',
            'file.max' => 'Ukuran maksimal file adalah 2MB!'
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads', 'public');
            return redirect()->route('files.list')->with('success', 'File berhasil diunggah!');
        }

        return back()->withErrors(['file' => 'Gagal mengunggah file.']);
    }

    public function deleteFile($filename)
    {
        if (Storage::disk('public')->exists('uploads/' . $filename)) {
            Storage::disk('public')->delete('uploads/' . $filename);
            return redirect()->route('files.list')->with('success', 'File berhasil dihapus.');
        }
        return back()->with('error', 'File tidak ditemukan.');
    }
}
```

---

## Modul 9: Scan QR/Barcode & API Development

**Tugas / Implementasi Utama:**
1. Integrasi API CRUD tambahan (Entitas `User` & `Product`).
2. Membuat endpoint untuk QR Code.
3. Mendokumentasikan API menggunakan Swagger/OpenAPI.
4. Membuat antarmuka kasir scanner (*Point of Sales*).

**1. `app/Http/Controllers/Api/ProductController.php` (Swagger Attributes & QR Code)**
```php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

#[OA\Tag(name: "Products", description: "API Endpoints for Products")]
class ProductController extends Controller
{
    #[OA\Get(path: "/api/products", summary: "Get list of products", tags: ["Products"], responses: [new OA\Response(response: 200, description: "Success")])]
    public function index() {
        return response()->json(Produk::all(), 200);
    }

    #[OA\Get(path: "/api/products/{id}/qrcode", summary: "Generate QR Code for a product", tags: ["Products"], parameters: [new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))], responses: [new OA\Response(response: 200, description: "Success")])]
    public function generateQrCode($id) {
        $product = Produk::findOrFail($id);
        
        // Generate QR URL dinamis
        $qrCodeUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=' . urlencode($product->sku);

        return response()->json([
            'success' => true,
            'sku' => $product->sku,
            'qr_code_url' => $qrCodeUrl
        ]);
    }
}
```

**2. `app/Http/Controllers/ScanController.php` (Backend Scanner Web)**
```php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produk;

class ScanController extends Controller
{
    public function processScanProduk(Request $request)
    {
        $request->validate(['code' => 'required|string']);

        $product = Produk::where('sku', $request->input('code'))->first();

        if ($product) {
            return response()->json([
                'success' => true,
                'product' => [
                    'name' => $product->nama,
                    'sku' => $product->sku,
                    'price' => $product->harga,
                    'kategori' => $product->kategori,
                ]
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Produk tidak ditemukan.']);
    }
}
```

**3. Script Blade (HTML5-QRCode) Kasir/Scanner (`resources/views/scandataproduk.blade.php`)**
```javascript
// Cuplikan AJAX pemrosesan scan data
fetch('/scan-produk', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({ code: scannedCode })
})
.then(res => res.json())
.then(data => {
    if (data.success) {
        // Logika penambahan produk ke keranjang array
        cart.push(data.product);
        updateCartTable();
    }
});
```
