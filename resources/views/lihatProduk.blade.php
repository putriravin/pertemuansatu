<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Produk</title>
</head>
<body>
    <h1>Data Produk</h1>
  
    <table border="1" cellspacing="0" style="width:100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks as $produk)
            <tr>
                <td>{{ $produk->nama }}</td>
                <td>{{ $produk->harga }}</td>
                <td>{{ $produk->stok }}</td>
                <td>{{ $produk->kategori }}</td>
                <td><img src="{{ asset(str_replace('public/', 'storage/', $produk->gambar)) }}" width="100"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
