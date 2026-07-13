<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas Baru</title>
</head>
<body>
    <h1>Tambah Kelas Baru</h1>

    <!-- Tampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <!-- Tampilkan pesan error jika ada -->
    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    <form action="{{ route('produk.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="nama">Nama Kelas / Kursus:</label><br>
        <input type="text" id="nama" name="nama" placeholder="Contoh: Kelas Dasar CSS"><br>

        <label for="harga">Harga Kelas (Rp):</label><br>
        <input type="number" id="harga" name="harga" placeholder="Contoh: 150000"><br>

        <label for="stok">Kuota Peserta (Sisa Slot):</label><br>
        <input type="number" id="stok" name="stok" placeholder="Contoh: 50"><br>

        <label for="kategori">Kategori:</label><br>
        <input type="text" id="kategori" name="kategori" placeholder="Contoh: Front-End / Back-End / Dasar"><br>

        <label for="gambar">Thumbnail Kelas:</label><br>
        <input type="file" id="gambar" name="gambar"><br>

        <button type="submit">Tambah Kelas</button>
    </form>
</body>
</html>
