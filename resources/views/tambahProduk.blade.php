<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>
    <h1>Tambah Produk</h1>
  
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
        <label for="nama">Nama Produk:</label><br>
        <input type="text" id="nama" name="nama"><br>
  
        <label for="harga">Harga:</label><br>
        <input type="number" id="harga" name="harga"><br>
  
        <label for="stok">Stok:</label><br>
        <input type="number" id="stok" name="stok"><br>
  
        <label for="kategori">Kategori:</label><br>
        <input type="text" id="kategori" name="kategori"><br>
  
        <label for="gambar">Gambar:</label><br>
        <input type="file" id="gambar" name="gambar"><br>
  
        <button type="submit">Submit</button>
    </form>
</body>
</html>
