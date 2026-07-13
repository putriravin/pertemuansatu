<!-- resources/views/nilai/show.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Mahasiswa</title>
</head>
<body>
    @if (!$mahasiswa)
        <p>Data mahasiswa tidak ditemukan</p>
    @else
        <h2>Nama Mahasiswa: {{ $mahasiswa->nama }}</h2>
        <ul>
            @forelse ($mahasiswa->nilais as $nilai)
                <li>
                    Matakuliah: {{ $nilai->matakuliah->nama }} | Nilai: {{ $nilai->nilai }}
                </li>
            @empty
                <li>Belum ada data nilai.</li>
            @endforelse
        </ul>
    @endif
</body>
</html>
