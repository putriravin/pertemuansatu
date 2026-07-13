<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kelas</title>
</head>
<body>
    <h1>Daftar Kelas yang Tersedia</h1>

    <table border="1" cellspacing="0" style="width:100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Nama Kelas</th>
                <th>Harga</th>
                <th>Kuota (Slot)</th>
                <th>Kategori</th>
                <th>Thumbnail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks as $produk)
            <tr>
                <td>{{ $produk->nama }}</td>
                <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                <td>{{ $produk->stok }} slot</td>
                <td>{{ $produk->kategori }}</td>
                <td><img src="{{ asset(str_replace('public/', 'storage/', $produk->gambar)) }}" width="100"></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="/tambah-produk">+ Tambah Kelas Baru</a>
</body>
</html>
